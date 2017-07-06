var elixir = require('laravel-elixir');
var notify = require("gulp-notify");

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
});
// var elixir = require('laravel-elixir');


elixir(function(mix) {

/*
    mix.copy('bower_components/georgian-webfonts/fonts', 'public/fonts')
    .copy('bower_components/glyphicons/fonts', 'public/fonts')
    .copy('bower_components/Font-Awesome/fonts', 'public/fonts')
    .copy('bower_components/georgian-webfonts/fonts', 'public/fonts')
    .copy('bower_components/bootstrap-formhelpers/img', 'public/img');
*/

    

    mix.styles([
    '../../../bower_components/bootstrap/dist/css/bootstrap.css',
    '../../../bower_components/georgian-webfonts/css/BPG Nateli.css',
    '../../../bower_components/georgian-webfonts/css/BPG Nateli Mtavruli.css',
    '../../../bower_components/Yamm3/yamm/yamm.css',
    '../../../bower_components/bootstrap-formhelpers/dist/css/bootstrap-formhelpers.css'  ,  
    '../../../bower_components/startbootstrap-half-slider/css/half-slider.css',    
    '../../../bower_components/startbootstrap-full-slider/css/full-slider.css',    
    '../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',    
    '../../../bower_components/Font-Awesome/css/font-awesome.min.css',    
    '../../../bower_components/googlefonts/roboto.css',    
    '../../../public/css/appstyle.css',    
]);


/*

    mix.scripts([
    '../../../bower_components/jquery/dist/jquery.min.js',
    '../../../bower_components/bootstrap/dist/js/bootstrap.min.js',    
    '../../../bower_components/bootstrap-formhelpers/dist/js/bootstrap-formhelpers.js',    
    '../../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',    
    '../../../bower_components/jquery-lazy/jquery.lazy.min.js',    
    '../../../bower_components/jquery-lazy/jquery.lazy.plugins.min.js',    
    '../../../public/js/appscripts.js',    
]);
*/


});



    
    
    
    
    
/*
** Lara Admin

elixir(function(mix) {

    mix.less('admin-lte/AdminLTE.less', 'public/la-assets/css');
    mix.less('bootstrap/bootstrap.less', 'public/la-assets/css');
    
    mix.less('app.less');
    
    
    mix.styles([
    '../../../public/la-assets/css/bootstrap.css',
    '../../../public/la-assets/css/font-awesome.min.css',
    '../../../public/la-assets/css/ionicons.min.css',
    '../../../public/la-assets/css/AdminLTE.css',
    '../../../public/la-assets/plugins/iCheck/square/blue.css',
    '../../../bower_components/wysiwyg-editor/css/froala_editor.pkgd.min.css',
    '../../../bower_components/wysiwyg-editor/css/froala_style.min.css',    
],'public/la-assets/css/all.css');








    mix.scripts([
    '../../../public/la-assets/plugins/jQuery/jQuery-2.1.4.min.js',
    '../../../public/la-assets/plugins/jquery-validation/jquery.validate.min.js',    
    '../../../public/la-assets/js/bootstrap.min.js',
    '../../../public/la-assets/plugins/select2/select2.full.min.js',
    '../../../public/la-assets/plugins/bootstrap-datetimepicker/moment.min.js',
    '../../../public/la-assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js',
    '../../../public/la-assets/plugins/stickytabs/jquery.stickytabs.js',
    '../../../public/la-assets/plugins/slimScroll/jquery.slimscroll.min.js',
    '../../../public/la-assets/js/app.min.js',    
    '../../../bower_components/wysiwyg-editor/js/froala_editor.pkgd.min.js',
],'public/la-assets/js/all.js');

});

** end of Lara Admin
*/




/*
var minify = require('gulp-minify');
gulp.task('compress', function() {
  gulp.src('lib/*.js')
    .pipe(minify({
        ext:{
            src:'-debug.js',
            min:'.js'
        },
        exclude: ['tasks'],
        ignoreFiles: ['.combo.js', '-min.js']
    }))
    .pipe(gulp.dest('dist'))
});
*/


