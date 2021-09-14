const gulp = require('gulp');
const gulpSass = require('gulp-sass');
const nodeSass = require('node-sass');
// const postcss = require('gulp-postcss');
const replace = require('gulp-replace');
const cssnano = require('gulp-cssnano');
const browserSync = require('browser-sync').create();
// const autoprefixer = require('autoprefixer');
const del = require('del');

const sass = gulpSass(nodeSass);

function doStyles(done) {
    return gulp.series(style, done => {
        cacheBust('./header.php', './');
        done();
    }) (done);
}

function style() {
    return gulp
        .src('assets/scss/*.scss')
        .pipe(sass())
        .on('error', sass.logError)
        // .pipe(postcss([autoprefixer()]))
        .pipe(cssnano())
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.stream());
}

function moveStyle() {
    return gulp
        .src('./css/style.css')
        .pipe(gulp.dest('./assets/css'));
}

function deleteStyle() {
    return del('./css/style.css');
} 

function cacheBust(src, dest) {
    var cbString = new Date().getTime();
    return gulp
        .src(src)
        .pipe(
            replace(/cache_bust=\d+/g, function() {
                return "cache_bust=" + cbString;
            })
        )
        .pipe(gulp.dest(dest));
}

function reload(done) {
    browserSync.reload();
    done();
}

function watch() {
    browserSync.init({
        proxy: 'https://gblocal.dv/'
    });
    gulp.watch('assets/scss/*.scss', doStyles);
    gulp.watch(['./*.php'], reload);
};

gulp.task('default', watch);