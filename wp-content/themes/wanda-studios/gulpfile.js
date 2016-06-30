var json = require('./package.json');
var gulp = require('gulp');
var ftp = require('gulp-ftp');
var imagemin = require('gulp-imagemin');
var compass = require('gulp-compass');
var minifyCss = require('gulp-minify-css');
var plumber = require('gulp-plumber');
var uglify = require('gulp-uglify');
var spritesmith = require('gulp.spritesmith');
var clean = require('gulp-clean');
var site_name = 'tribute';

var config_to_css = {
    host: '192.168.88.5',
    user: 'myyb0',
    pass: 'shiezowo',
    remotePath : '/flowasia/'+site_name+'/wp-content/themes/'+site_name+'/css/'
};
var config_to_js = {
    host: '192.168.88.5',
    user: 'myyb0',
    pass: 'shiezowo',
    remotePath : '/flowasia/'+site_name+'/wp-content/themes/'+site_name+'/js/'
};

function getDeploySetting(dest){
    return {
        host: json.settings.ftp_host,
        user: json.settings.user,
        pass: json.settings.pass,
        remotePath : json.settings.project.replace('@sitename', json.settings.sitename).replace('@themename', json.settings.themename) + dest
    }
}

gulp.task('compass', function() {
    gulp.src('scss/**/*.scss')
        .pipe(compass({
            config_file: 'config.rb',
            css: 'css',
            sass: 'scss',
            sourcemap: true
        }))
        .pipe(plumber())
        .pipe(minifyCss({compatibility: 'ie8'}))
        .pipe(plumber())
        .pipe(gulp.dest('css'));
});
gulp.task('compress', function() {
    return gulp.src('js/src/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('js'))
        .pipe(ftp(getDeploySetting('js')));
});
gulp.task('upload_css', function(){
    return gulp.src('css/**/*.*')
        .pipe(ftp(getDeploySetting('css')));
});
gulp.task('imagemin', function(){
    return gulp.src('images/uncompress/**/*.*')
        .pipe(imagemin())
        .pipe(clean({force: true}))
        .pipe(gulp.dest('images'));
});
gulp.task('sprite', function () {
    var spriteData = gulp.src('images/icon/*.png').pipe(spritesmith({
        imgName: '../images/sprite.png',
        cssName: '../scss/_sprite.scss',
        algorithm: 'binary-tree',
        padding: 15,
        cssTemplate: 'scss/handlebarsStr.css.handlebars'
    }));
    return spriteData.pipe(gulp.dest('images'));
});
gulp.task('default',function() {
    gulp.watch('scss/**/*.scss',['compass']);

    gulp.watch('js/src/*.js', ['compress']);
    gulp.watch('images/uncompress/**/*.*', ['imagemin']);
    gulp.watch('images/icons/*.*', ['sprite']);
    gulp.watch('images/*.*').on('change', function(file){
        console.log(file);
        gulp.src(file.path)
            .pipe(ftp(getDeploySetting('images')));
    });;
    gulp.watch('css/*.*').on('change', function(file){
        console.log(file);
        gulp.src(file.path)
            .pipe(ftp(getDeploySetting('css')));
    });
});