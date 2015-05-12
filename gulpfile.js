var gulp = require("gulp");
var util = require("gulp-util");
var exec = require("child_process").exec;
var sys = require("sys");
var karma = require("karma").server;

gulp.task("phpunit", phpunit);
gulp.task("karmaunit", karmaunit);
gulp.task("watch", watch);
gulp.task("default", ["phpunit", "watch"]);

function phpunit () {
	exec("phpunit", function (error, stdout) {
		sys.puts(stdout);
	});
}

function karmaunit (done) {
	karma.start({
		configFile: __dirname + "/karma.conf.js",
		singleRun: true
	}, done);
}

function watch () {
	gulp.watch([
		"app/**/*.php",
		"tests/**/*",
		"resources/**/*.php",
		"bootstrap/**/*.php",
		"public/**/*",
		"gulpfile.js"

	], ["phpunit", "karmaunit"]);
}
