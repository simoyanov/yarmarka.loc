'use strict';

// include gulp
var gulp = require('gulp');
var pkg = require('./package.json');
// include plug-ins
var concat  = require('gulp-concat');
var rename = require('gulp-rename');
//var sass    = require('gulp-sass');
var less    = require('gulp-less');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var prefix = require('gulp-autoprefixer');
var jshint = require('gulp-jshint');
var stripDebug = require('gulp-strip-debug');
var clean = require('gulp-clean');
var minifycss = require('gulp-minify-css');
var notify = require('gulp-notify');
var jade = require('gulp-jade');
var plumber = require('gulp-plumber');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');

var version     = pkg.version;
var name        = pkg.name;
var browsers    = pkg.browsers;

//src file
var source_images   = './src/images/**/*';
var source_js       = './src/scripts/*.js';
var source_sass     = './src/sass/styles.scss';
var source_less     = './src/less/app.less';
//var htmlSrc = './src/html/*.html';
//var srcjade        ='./src/jade/*.jade';


//custom destination
var destination         = '../catalog/view/theme/' + name + '/assets/*';
var destination_css     = '../catalog/view/theme/' + name + '/assets/css/';
var destination_js      = '../catalog/view/theme/' + name + '/assets/js/';
var destination_fonts   = '../catalog/view/theme/' + name + '/assets/fonts/';
var destination_image   = '../catalog/view/theme/' + name + '/assets/css/img';

//clean task
gulp.task('clean', function() {
    return gulp.src(destination,{
            read:false
        })
        .pipe(clean({force: true}));
});
// tasks copy font-awesome 
gulp.task('copyfontawesome', function() {
    return gulp.src('./bower_components/font-awesome/fonts/*')
        .pipe(gulp.dest(destination_fonts+'font-awesome'));
});
// tasks copy font-glyphicon 
gulp.task('copyfontglyphicon', function() {
    return gulp.src('./bower_components/bootstrap/js/fonts/**/*')
    .pipe(gulp.dest(destination_fonts))
    .pipe(notify({
            title: 'copyfontglyphicon',
            message: 'copy - DONE!'
    }));
});


//sass task
/*
gulp.task('sass', function() {
    gulp.src(source_sass)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({
           errLogToConsole: true
        }).on('error', sass.logError))
        //.pipe(prefix("last 2 version", "> 1%"))
        .pipe(rename(name+'.css'))
        .pipe(gulp.dest(destination_css))
        .pipe(minifycss())
        .pipe(rename(name+'.min.css'))
        .pipe(sourcemaps.write())
        .pipe(notify({
            title: 'sass',
            message: 'DONE!'
        }))
        .pipe(gulp.dest(destination_css));
});
*/

//imgmin
gulp.task('minimg', () => {
	return gulp.src('src/images/*')
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [pngquant()]
		}))
		.pipe(gulp.dest('dest/images'));
});

//less

gulp.task('less', function() {
    gulp.src(source_less)
         .pipe(plumber())
        .pipe(less())
        .pipe(rename(name+'.css'))
        .pipe(prefix({
            browsers: ['last 2 versions', '> 1%', 'ie 9', 'Firefox >= 10', 'Safari >= 1', 'Opera >= 8'],
            cascade: false
        }))
        .pipe(gulp.dest(destination_css))
        .pipe(minifycss())
        .pipe(rename(name+'.min.css'))
        .pipe(notify({
            title: 'less',
            message: 'DONE!'
        }))
        .pipe(gulp.dest(destination_css));
});
// JS concat, strip debugging and minify
var sourcesjs  = [
    './bower_components/modernizr/modernizr.js',
    './bower_components/jquery/dist/jquery.js',
    './bower_components/masonry/dist/masonry.pkgd.js',
    './bower_components/imagesloaded/imagesloaded.pkgd.js',
    
    './bower_components/bootstrap/js/transition.js',
    './bower_components/bootstrap/js/alert.js',
    './bower_components/bootstrap/js/button.js',
    './bower_components/bootstrap/js/carousel.js',
    './bower_components/bootstrap/js/collapse.js',
    './bower_components/bootstrap/js/dropdown.js',
    './bower_components/bootstrap/js/modal.js',
    './bower_components/bootstrap/js/tooltip.js',
    './bower_components/bootstrap/js/popover.js',
    './bower_components/bootstrap/js/scrollspy.js',
    './bower_components/bootstrap/js/tab.js',
    './bower_components/bootstrap/js/affix.js', 
    './bower_components/slick-carousel/slick/slick.js',
    './bower_components/wow/dist/wow.js',

    './src/scripts/parallax.js',
    './src/scripts/ease.min.js',
    './src/scripts/segment.min.js',
    './src/scripts/menu.js',
    './src/scripts/main.js',
    './src/scripts/map.js',
    
    
    'src/scripts/_help.js',
    'src/scripts/_news.js',
    //'src/scripts/_fermer.js',
    'src/scripts/_filtermap2.js',
    'src/scripts/_action.js',
    'src/scripts/_visual.js',
    'src/scripts/jquery.transit.min.js',
    'src/scripts/stellar.js',
    'src/scripts/_common.js'
    
];

var custom_sourcesjs = [
    
    'src/scripts/_news.js',
    'src/scripts/_fermer.js',
    'src/scripts/_action.js',
    'src/scripts/_visual.js',
    'src/scripts/_common.js'
];
gulp.task('scripts', function() {
    return gulp.src(sourcesjs)
        .pipe(plumber())
        .pipe(concat(name+'.js'))
        .pipe(gulp.dest(destination_js))
        .pipe(notify({
            title: 'scripts',
            message: 'concat - DONE!'
        }))
        .pipe(uglify())
        .pipe(rename(name+'.min.js'))
        .pipe(gulp.dest(destination_js))
        .pipe(notify({
            title: 'scripts',
            message: 'uglify - DONE!'
        }));
});
// JS hint task ???
gulp.task('jshint', function() {
    return gulp.src(custom_sourcesjs)
        .pipe(plumber())
        .pipe(stripDebug())
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

//jade task
//gulp.task('jade', function() {
//    gulp.src([srcjade])
//        .pipe(jade())
//        .pipe(gulp.dest(jadetarget))
//});

// default gulp task
gulp.task('default', ['less', 'scripts']);
// default gulp task
gulp.task('watch', function() {
    gulp.watch('./src/scripts/*.js', ['jshint','scripts']);
    gulp.watch('./src/sass/**/*.scss', ['sass']);
    gulp.watch('./src/less/*.less', ['less']);
    gulp.watch('./src/less/**/*.less', ['less']);
    gulp.watch('./src/jade/**/*', ['jade']);
});

