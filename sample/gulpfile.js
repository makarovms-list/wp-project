'use strict';

var gulp         = require('gulp'),
	sass         = require('gulp-sass'),
	cleanCSS     = require('gulp-clean-css'),
	rename       = require('gulp-rename'),
	autoprefixer = require('gulp-autoprefixer'),
	sourcemaps   = require('gulp-sourcemaps'),
	spritesmith  = require('gulp.spritesmith'),
	sassGlob 	 = require('gulp-sass-glob'),
	svgSprite 	 = require('gulp-svg-sprite'),
	svgmin 		 = require('gulp-svgmin'),
	cheerio 	 = require('gulp-cheerio'),
	replace 	 = require('gulp-replace'),
	gulpsync 	 = require('gulp-sync')(gulp);

var path = {
	src: {
		scss: 'scss/main.scss',
		sprite: 'images/icons/*.*',
		svg: 'images/svg-icons/*.svg'
	},
	dest: {
		css: 'css',
		sprite: 'images/',
		spriteScss: 'scss/helpers/',
		svg: 'images/'
	}
}

/****************************
Task for svg sprites build
****************************/

gulp.task('svg-build', function () {
	return gulp.src(path.src.svg)
		.pipe(svgmin({
			plugins: [
				{removeXMLNS: true},
				{removeStyleElement: true},
			]
		}))
		.pipe(cheerio({
			run: function ($) {
				$('[fill]').removeAttr('fill');
				$('[style]').removeAttr('style');
				$('[class]').removeAttr('class');
				$('[data-name]').removeAttr('data-name');
			},
			parserOptions: { xmlMode: true }
		}))
		.pipe(replace('&gt;', '>'))
		.pipe(svgSprite({
			mode: {
				symbol: {
					dest : '.',
					sprite: "svg-sprite.svg",
					inline: true,
					render: {
						scss: {
							dest:'../scss/helpers/_svg_sprite.scss',
							template: "scss/helpers/_svg_template.scss"
						},
					},
				},
			},
			shape: {
				id: {
					generator: 'icon-%s'
				}
			},
		}))
		.pipe(gulp.dest(path.dest.svg));
});

/****************************
Task for scss build
****************************/

gulp.task('sass', function(){
	return gulp.src(path.src.scss)
		.pipe(sourcemaps.init())
		.pipe(sassGlob({
			ignorePaths: [
				'base/_normalize.scss',
				'helpers/_variables.scss',
				'helpers/_functions.scss',
				'helpers/_mixins.scss',
				'helpers/_svg_template.scss',
			]
		 }))
		.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
		.pipe(autoprefixer(['last 15 versions', '> 1%'], { cascade: true }))
		.pipe(cleanCSS({keepSpecialComments: 0}))
		.pipe(rename({basename: 'styles',suffix: '.min'}))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(path.dest.css))
});

/****************************
Task for png sprite build
****************************/

gulp.task('sprite', function() {
	var spriteData = 
		gulp.src(path.src.sprite)
			.pipe(spritesmith({
				imgName: 'sprite.png',
				cssName: '_sprite.scss',
				cssFormat: 'scss',
				imgPath: '../images/sprite.png',
				algorithm: 'binary-tree',
				padding: 3,
				cssVarMap: function(sprite) {
					sprite.name = 'i-' + sprite.name
				}
			}));
	spriteData.img.pipe(gulp.dest(path.dest.sprite));
	spriteData.css.pipe(gulp.dest(path.dest.spriteScss));
});

/****************************
	Watch task
****************************/

gulp.task('watch', gulpsync.sync(['svg-build', 'sprite', 'sass']), function() {
	gulp.watch('scss/**/*.+(scss|sass)', ['sass']);
});
