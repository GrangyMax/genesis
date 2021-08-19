const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
 
//минификация СSS 
gulp.task('minify-css', () => {
  return gulp.src('app/*.css')
    .pipe(cleanCSS())
    .pipe(gulp.dest('minify-css/'));
});

const minify = require('gulp-minify');

//минификация JS 
gulp.task('minify-js', function() {
  return gulp.src(['app/js/plugins/*.js'])
    .pipe(minify({
        ext: {
            min: '.js' // Set the file extension for minified files to just .js
        },
        noSource: true // Don’t output a copy of the source file
    }))
    .pipe(gulp.dest('1/plugins'))
});


//объединение файлов
var concat = require('gulp-concat');
 
gulp.task('summary', function() {
  return gulp.src('dist/js/*.js')
    .pipe(concat('all.js'))
    .pipe(gulp.dest('summary/'));
});