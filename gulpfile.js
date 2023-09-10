
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const browserSync = require('browser-sync').create()
const concat = require('gulp-concat')
const minify = require('gulp-minify');



function style(){

    return gulp.src('./sass/**/*.scss')
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(concat('custom.css'))
    .pipe(gulp.dest('./asset/css'))
    .pipe(browserSync.stream())

}


function watch(){

    browserSync.init({
        proxy: 'http://localhost:8888/wordpress/rlestate/',

      })

    gulp.watch('./sass/**/*.scss', style)
    gulp.watch('./**/*.php').on('change', browserSync.reload)
  
}


exports.style = style;
exports.watch = watch;