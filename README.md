# RAGA10: network of organizations with Wordpress!

With RAGA10 you can deploy a site with the following out-of-the-box features:

* blog for organizations with moderation
* calendar with events signalled by organizations
* list of organizations included in the site

This site has been realized in 2011 with Ancona Province funds for youngers organizations,
promoted by Ambito Sociale 10, and [InArte](http://inartefabriano.it) and developed by the [PDP Free Software User Group](http://pdp.linux.it).

Organizations in [Fabriano](http://comune.fabriano.gov.it) were involved in the service and
organizations themselves contributed to feed contents of the portal.

This project has born for [free software (as in freedom) at service of territories by the beFair team](http://www.befair.it),
and has been manintained since 2012 by [Luca Ferroni](http://www.lucaferroni.it)

In 2016 the [Makerspace of the Public Library in Fabriano](http://www.bibliofabriano.it)
takes care of the project to update it for city needings.

At that time we have taken some more effort to make it easily reusable from others.

## Directory structure

* `wp_raga10`: the Wordpress site -> do not commit your settings!
* `db`: holds the schema of the installation db TODO
* `settings`: holds application settings -> do not commit your settings!
* `deploy`: configurations files used to deploy the service, you have to adapt to your own server; -> do not commit your passwords!
* `backups`: placeholder directory to holds backup if you want -> do not commit your data!

