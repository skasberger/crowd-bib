crowd bib
==============================

Basecily, this webservice is a form to collect bibliographic data within a scientific discipline via crowdsourcing. The collected data is shared as open data and also the sourcecode is openly available.

This service offers a form where you can enter the data, a list to present the collection and an login section to edit the submissions.

The sourcecode is licensed under the [MIT License](http://opensource.org/licenses/MIT).

The data is licensed under the []().

<!--**[WEBPAGE](WEBPAGEURL)**-->

## DEPLOY

After 5min, the deployment to your site should be finished.

**Prerequisites**: A mySQL database and a webserver running php. 

**1: Download repo:** Download this repo to your webspace with php running. 

**2: Create a database:** Go into your admin area and create a mySQL database. For this, you only have to change TABLENAME inside the ```create.sql``` template to your needs. 

**3: Configure your config.php:** Copy ```config-sample.php`` and rename it to ```config.php```. Then open it and - in support of the comments - add your paramters.

**4: Configure config-user.php** Copy ```config-user-sample.php and rename it to ```config-user.php. Finally, enter your login data as you wish.

**Optional: Wordpress Template:** Copy the ```config.php``` and rename it to ```config-bib.php. Then copy the ```config-bib.php``` and the ```template-bib.php``` in your wordpress theme folder. Now create a new page in wordpress and with the crowd-bib template.

## DOCUMENTATION
### General
[Danah Boyd](http://www.danah.org/) and [Dylan Field](https://twitter.com/dylanjfield) developed the initial version of this crowd-sourced bibliography for research on [Social Network Sites](http://www.danah.org/researchBibs/sns.php) and [Twitter](http://www.danah.org/researchBibs/twitter.php). Danah also provided the source code. 

[Stefan Kasberger](http://www.github.com/skasberger) built on this and added some minor changes to make it more flexible in deployment.

Feel free to make your own bibliography for your own research interests. The project was started during the fellowship of [Julian Ausserhofer](http://ausserhofer.net) at [Alexander von Humboldt Institute for Internet and Society](http://hiig.de/).

## ToDo

## CHANGELOG
### Version x.y - yyyy-mm-dd


## SOURCES

