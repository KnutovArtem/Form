'use strict';
const gulp = require('gulp');
const scss = require('gulp-sass');
const babel = require("gulp-babel");
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const notify = require("gulp-notify");

// babel
gulp.task("default", function () {
	return gulp.src('app/js/common.js')
		.pipe(babel())
		.pipe(gulp.dest('app'));
});

// js
gulp.task('js', function () {
	return gulp.src([
			'./node_modules/simplebar/dist/simplebar.js',
			'app/js/form.js',
			'app/js/select.js',
			'app/js/mask.js',
			'app/js/validation.js',
		])
		.pipe(babel())
		.pipe(concat('scripts.min.js'))
		 .pipe(uglify())
		.pipe(gulp.dest('app/js'));
});

// scss
gulp.task('scss', function () {
	return gulp.src([
		'./node_modules/simplebar/dist/simplebar.css',
		'app/scss/**/*.scss'
	])
		.pipe(scss({
			outputStyle: 'expand'
		}).on("error", notify.onError()))
		.pipe(rename({
			suffix: '.min',
			prefix: ''
		}))
		.pipe(autoprefixer(['last 15 versions']))
		.pipe(cleanCSS())
		.pipe(concat('main.min.css'))
		.pipe(gulp.dest('app/css'));
});

// watch
gulp.task('watch', function () {
	gulp.watch('app/scss/**/*.scss', gulp.parallel('scss'));
	gulp.watch([
		'app/js/validation.js',
		'app/js/select.js',
		'app/js/form.js',
		'app/js/script.min.js',
	], gulp.parallel('js'));
});

gulp.task('default', gulp.parallel('scss', 'js', 'watch'));