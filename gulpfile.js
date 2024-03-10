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

function style_admin(){

    return gulp.src('./core/admin/sass/**/*.scss')
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(concat('edit.css'))
    .pipe(gulp.dest('./core/admin/css'))
    .pipe(browserSync.stream())

}


function watch(){

    browserSync.init({
        proxy: 'http://horizon.local/',

      })

    gulp.watch('./sass/**/*.scss', style)
    gulp.watch('./core/admin/sass/**/*.scss', style_admin)
    gulp.watch('./**/*.php').on('change', browserSync.reload)
  
}


exports.style = style;
exports.style_admin = style_admin;
exports.watch = watch;