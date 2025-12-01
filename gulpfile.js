const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const terser = require('gulp-terser');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const path = require('path');

// scss → css minifié globaux
gulp.task('scss-global', function () {
  return gulp.src(['src/scss/styles.scss', 'src/scss/bases.scss'], { allowEmpty: true })
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('dist/css'));
});

// scss → css minifié par blocs
gulp.task('scss-blocks', function () {
  return gulp.src('parts/acf/blocks/**/*.scss', { allowEmpty: true })
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(function(file) {
      return file.base;
    }));
});

// JS → JS minifié globaux
gulp.task('js-global', function () {
  return gulp.src('src/js/*.js')
    .pipe(sourcemaps.init())
    .pipe(terser())
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('dist/js'));
});

// JS → JS minifié par blocs
gulp.task('js-blocks', function () {
  return gulp.src(['parts/acf/blocks/**/*.js', '!parts/acf/blocks/**/*.min.js'], { allowEmpty: true })
    .pipe(sourcemaps.init())
    .pipe(terser().on('error', function(err) {
      console.error('Terser error:', err.toString());
      this.emit('end');
    }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(function(file) {
      return file.base;
    }));
});

// SCSS task combinée
gulp.task('scss', gulp.series('scss-global', 'scss-blocks'));

// JS task combinée
gulp.task('js', gulp.series('js-global', 'js-blocks'));

// Watch
gulp.task('watch', function () {
  gulp.watch(['src/scss/**/*.scss'], gulp.series('scss-global'));
  gulp.watch(['parts/acf/blocks/**/*.scss', '!parts/acf/blocks/**/*.min.css'], gulp.series('scss-blocks'));
  
  gulp.watch(['src/js/**/*.js'], gulp.series('js-global'));
  gulp.watch(['parts/acf/blocks/**/*.js', '!parts/acf/blocks/**/*.min.js'], gulp.series('js-blocks'));
});

// Tâche par défaut
gulp.task('default', gulp.series('scss', 'js', 'watch'));