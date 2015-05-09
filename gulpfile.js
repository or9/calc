var gulp = require("gulp");
var util = require("gulp-util");
var exec = require("child_process").exec;
var sys = require("sys");

gulp.task("phpunit", phpunit);
gulp.task("watch", watch);
gulp.task("default", ["phpunit", "watch"]);

function phpunit () {
	exec("phpunit", function (error, stdout) {
		sys.puts(stdout);
	});
}

function watch () {
	gulp.watch([
		"app/**/*.php",
		"tests/**/*.php",
		"resources/views/**/*",
		"public/js/**/*"
	], ["phpunit"]);
}
