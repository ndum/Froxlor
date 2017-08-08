<?php if (!defined('MASTER_CRONJOB')) die('You cannot access this file directly!');

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  (c) the authors
 * @author     Nicolas D <nd@nidum.org>
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Cron
 *
 * @since      0.9.37
 *
 */

class phpfpm_restart
{
	
	/*
	 * Froxlor's $cronlog
	 */
	private $logger = array();
	
	/*
	 * All required run-scripts
	 */
	private $runscripts = array();
	
	public function __construct($logger) {
		$this->logger = $logger;
		
		$result_get_runscripts_stmt = Database::query("
			SELECT DISTINCT `runscript` FROM`" . TABLE_PANEL_PHPCONFIGS . "`");
		while ($row = $result_get_runscripts_stmt->fetch(PDO::FETCH_ASSOC)) {
			if($row['runscript'] == '') {
				continue;
			}
			$this->runscripts[] = array($row['runscript']);
		}
		$this->runscripts[] = array(substr(Settings::Get('phpfpm.reload'), 0, -8));
	}
	
	public function restart() {
		$this->logger->logAction(CRON_ACTION, LOG_NOTICE, 'restarting php-fpm');
		foreach($this->runscripts as $outerarray) {
			foreach($outerarray as $runscript) {
				safe_exec("{$runscript} stop");
			}
		}

		foreach($this->runscripts as $outerarray) {
			foreach($outerarray as $runscript) {
				safe_exec("{$runscript} start");
			}
		}

	}
	
}