# Isobar Basic Template

This is a basic template for small projects, or any non-CMS/WordPress projects. The folder stucture is similar to our WordPress theme. It uses Gulp to compile assets.

## Getting started

1. Clone this into webdev2 `git clone git@git.isobar.ie:isobar/basic-template.git`
2. Run `npm install`
3. Create the folder *bower_components* `mkdir bower_components`
3. If you need a DB, go to **Setting DB**
4. Build something and then run `gulp`

## Setting VirtualHost

> If you want to access to your project, you need to set *vhost* up.

1. Copy the example file *basic-template.conf.example* into */home/name_user/vhosts/* `cp basic-template.conf.example ../../vhosts/basic-template.conf`
2. Edit the file and change *name_user* for your user name folder
3. Restart apache `sudo systemctl restart apache2`
4. Go to your favorite browser and write **basic-template.name_user/** (don't forget the `/`)

## Setting DB

> If you need to setting a DB up, following the next steps. But if you need to setting a WordPress up, go to [https://git.isobar.ie/lucidity/wordpress4](https://git.isobar.ie/lucidity/wordpress4) for more information.

*building in the future...*



