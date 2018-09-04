var gulp = require('gulp'),
	sass = require('gulp-sass'),
	BrowserSync = require('browser-sync'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglifyjs'),
	cssnano = require('gulp-cssnano'),
	rename = require('gulp-rename'),
	del = require('del'),
	imagemin = require('gulp-imagemin'),
	png = require('imagemin-pngquant'),
	autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', function() {
	return gulp.src('src/sass/**/*.s[ac]ss')
	.pipe(sass())
	.pipe(autoprefixer({
		browsers: ['last 3 versions',
		'> 1%',
		'ie 8',
		'ie 7']
	}))
	.pipe(gulp.dest('src/css'))
	.pipe(BrowserSync.reload({stream: true}))
});


gulp.task('browser-sync', function(){
	BrowserSync({
		server: {
			baseDir: 'src'
		}
	});
});

gulp.task('scripts', function(){
	return gulp.src('src/supro/*.js')
		.pipe(concat('libs.min.js'))
		.pipe(gulp.dest('src/js'))
		.pipe(BrowserSync.reload({stream: true}));
});

gulp.task('css-libs', ['sass'], function(){
	return gulp.src('src/libs/**/*.css')
	.pipe(cssnano())
	.pipe(rename({suffix: '.min'}))
	.pipe(gulp.dest('src/css'));
});

gulp.task('clean', function(){
	return del.sync('dist');
});

//gulp.task('img', function(){
	//return gulp.src('src/img/**/*')
/*	.pipe(imagemin({
		interlaced: true,
		progressive: true,
		svgoPlugins: [{removeViewBox: false}],
		use: [pngquant()]
	}))
	.pipe(gulp.dest('dist/img'));
});*/

gulp.task('watch', ['browser-sync', 'css-libs', 'scripts'], function(){
	gulp.watch('src/sass/**/*.sass', ['sass']);
	gulp.watch('src/*html', BrowserSync.reload);
	gulp.watch('src/supro/*.js', ['scripts']);
	gulp.watch('src/js/**/*js', BrowserSync.reload);

});

gulp.task('build', ['clean', /*'img',*/ 'sass', 'scripts'], function(){
	var BuildCss = gulp.src([
		'src/css/main.css',
		'src/css/libs.min.css'	
		])
	.pipe(gulp.dest('dist/css'))

	var BuildFonts = gulp.src('src/fonts/**/*')
	.pipe(gulp.dest('dist/fonts'))

	var BuildJS = gulp.src('src/js/**/*')
	.pipe(gulp.dest('dist/js'))

	var BuildHTML = gulp.src('src/*.html')
	.pipe(gulp.dest('dist'));

});
