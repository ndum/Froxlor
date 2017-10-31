# Froxlor

## Attention - This an unofficial Fork!!!

### Changes
 1. Support for multiple PHP versions - also with **PHP-FPM** support (selectable)
 2. All official Froxlor Commits summarized until October 2017
 3. Other small/minor improvements... more will follow

## Installation

### Fast install
1. Ensure that your webserver serves /var/www
2. Extract froxlor into /var/www
3. Point your browser to http://[ip-of-webserver]/froxlor
4. Follow the installer
5. Login as administrator
6. Adjust "System > Settings" according to your needs
7. Choose your distribution under "System > Configuration"
8. Follow the steps for your services
9. Have fun!

### Detailed installation
https://github.com/Froxlor/Froxlor/wiki/Install-froxlor-from-tarball

## Help

You may find help in the following places:

### IRC

froxlor may be found on freenode.net, channel #froxlor:
irc://chat.freenode.net/froxlor

### Forum

The community is located on http://forum.froxlor.org

### Wiki

More documentation may be found in the froxlor - wiki:
https://github.com/Froxlor/Froxlor/wiki

## License

May be found in COPYING

## Downloads

### Tarball
http://files.froxlor.org/releases/froxlor-latest.tar.gz [MD5](http://files.froxlor.org/releases/froxlor-latest.tar.gz.md5) [SHA1](http://files.froxlor.org/releases/froxlor-latest.tar.gz.sha1)

### Debian repository

[HowTo](https://github.com/Froxlor/Froxlor/wiki/Install-froxlor-on-debian)

/etc/apt/sources.list.d/froxlor.list
> deb http://debian.froxlor.org {wheezy|jessie} main

### Gentoo repository

[HowTo](https://github.com/Froxlor/Froxlor/wiki/Install-froxlor-on-gentoo)

http://files.froxlor.org/gentoo/repositories.xml

## Let's Encrypt support

This version of Froxlor contains a test implementation of support for [Let's Encrypt](https://letsencrypt.org). This is (as Let's Encrypt is in itself)
still a beta version and may break your system. The way it currently works is by creating a (sub-)domain with the default system - certificate,
after which the Let's Encrypt cronjob orders the certificate for this (sub-)domain and inserts the certificates in the database. With the next run
of the default cronjob, the certificates will be updated on the disk and the webserver reloaded.

This has 2 known side-effects at the moment:
* The basic ip/port combinations don't work with the Froxlor - integration of Let's Encrypt, since it needs a certificate for the very first creation
* After creating a domain, it will have the default certificate for a short time (by default 5 minutes until the cronjob runs the next time)

It may be possible to fix these issues, but they are not a priority at the moment

## Contributing

[see here](.github/CONTRIBUTING.md)
