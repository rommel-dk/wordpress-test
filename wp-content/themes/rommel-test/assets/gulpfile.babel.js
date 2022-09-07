'use strict';

/**
 * Imports and paths.
 */
import gulp from 'gulp';
import babel from 'gulp-babel';
import cleanCSS from 'gulp-clean-css';
import postcss from 'gulp-postcss';
import postcssImport from 'postcss-import';
import postcssExtend from 'postcss-extend-rule';
import postcssPresetEnv from'postcss-preset-env';
import reporter from'postcss-reporter';
import del from 'del';
import image from 'gulp-image';
import livereload from 'gulp-livereload';
import uglify from 'gulp-uglify';
import svgSprite from 'gulp-svg-sprite';
import stylelint from 'stylelint';

const assetPaths = {
	src: 'src',
	dest: 'dist',
};

const path = {
	stylesheets: {
		src: assetPaths.src + '/css',
		dest: assetPaths.dest + '/css',
	},
	js: {
		src: assetPaths.src + '/js',
		dest: assetPaths.dest + '/js',
	},
	images: {
		src: assetPaths.src + '/images',
		dest: assetPaths.dest + '/images',
	},
	fonts: {
		src: assetPaths.src + '/fonts',
		dest: assetPaths.dest + '/fonts',
	},
	icons: {
		src: assetPaths.src + '/icons',
		dest: assetPaths.dest + '/icons',
		spriteSrc: assetPaths.dest + '/icons/*.svg',
		spriteDest: assetPaths.dest + '/icons/dist'
	},
	node_modules: {
		src: './node_modules',
		dest: assetPaths.dest + '/libs',
	},
};

/**
 * Task definitions.
 */
const clean = () => del([assetPaths.dest]);

function styles() {
	return gulp.src(path.stylesheets.src + '/*.css')
		.pipe(postcss([
			postcssImport({
				plugins: [
					stylelint(),
				],
			}),
			postcssExtend(),
			postcssPresetEnv({
				stage: 1,
				features: {
					'custom-properties': false
				}
			}),
			require( 'postcss-object-fit-images' ),
			reporter({ clearReportedMessages: true }),
		]))
		.pipe( postcss( [ require( 'postcss-object-fit-images' )] ) )
		.pipe(cleanCSS())
		.pipe(gulp.dest(path.stylesheets.dest))
		.pipe(livereload());
}

function javascript() {
	return gulp.src(path.js.src + '/**/*.js')
		.pipe(babel({
			presets: ['@babel/preset-env']
		}))
		.pipe(uglify())
		.pipe(gulp.dest(path.js.dest))
		.pipe(livereload());
}

function libs() {
	return gulp.src( [
		path.node_modules.src + '/svg4everybody/dist/svg4everybody.min.js',
		path.node_modules.src + '/ie11-custom-properties/ie11CustomProperties.js',
		path.node_modules.src + '/object-fit-images/dist/ofi.js',
		path.node_modules.src + '/tingle.js/dist/tingle.min.js',
	] ).pipe( gulp.dest( path.node_modules.dest ) );
}

function images() { // Only include images in top dir for now.
	return gulp.src(path.images.src + '/*')
		.pipe(image())
		.pipe(gulp.dest(path.images.dest));
}

function iconOptimize() {
	return gulp.src(path.icons.src + '/*')
		.pipe(image())
		.pipe(gulp.dest( path.icons.dest ));
}

function iconSprite() {
	return gulp.src(path.icons.spriteSrc)
		.pipe(svgSprite({
			svg: {
				xmlDeclaration: false,
				doctypeDeclaration: false,
				namespaceIDs: false,
				namespaceClassnames: false
			},
			mode: {
				symbol: {
					inline: true,
					sprite: 'icon-sprite.svg',
					dest: '.'
				}
			},
		}))
		.on('error', function(error){
			console.log(error);
		})
		.pipe(gulp.dest(path.icons.spriteDest));
}

function icons(cb) {
	gulp.series(iconOptimize, iconSprite);
	cb();
}

function fonts() {
	return gulp.src(path.fonts.src + '/**/*')
		.pipe(gulp.dest(path.fonts.dest))
		.pipe(livereload());
}

function watch() {
	livereload.listen();
	gulp.watch(path.stylesheets.src + '/**/*.css', styles);
	gulp.watch(path.js.src + '/**/*.js', javascript);
	gulp.watch(path.images.src + '/**/*', images);
	gulp.watch(path.icons.src + '/**/*', icons);
	gulp.watch(path.fonts.src + '/**/*', fonts);
}

/**
 * Operations.
 */
exports.default = gulp.series(clean, gulp.parallel(styles, libs, javascript, images, fonts), iconOptimize, iconSprite, watch);
