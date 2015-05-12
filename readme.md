#Calc  

##Usage
Front-end uses WebcomponentsJS so will only work with Chrome by default, and Safari with a polyfill. To enable in Firefox, navigate to `about:config`, search for `webcomponents` and change to `true`. 

##Running The App  
```
composer install  
npm install
```

##Development  
`gulp watch` will run `phpunit` whenever a file is changed.  
* `php artisan serve`  
* Tests should be named `*Test.php` 
* `*Test.php` should contain public methods named `test*` 
* Run via `phpunit` or `gulp`  

##Issues
Apparently not every environment has `bcmath` by default. This will cause invalid responses (`500`), resulting in empty `JSON.parse` throwing up.  
Fix: Add it to `composer.json`.

Laravel routes were not treating singleton as expected. Switched to using `Session` (and `Facades`) to circumvent.

Shadow DOM styling is weird.

