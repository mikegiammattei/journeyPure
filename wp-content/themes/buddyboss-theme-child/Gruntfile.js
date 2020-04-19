module.exports = function(grunt){
    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),
        sass: {
            dist: {
                options:{
                    style: 'compressed'
                },
                files: [{
                    expand: true,
                    cwd: './assets/scss',
                    src: ['jp-style.scss'],
                    dest: './assets/css',
                    ext: '.css'
                }
                ]
            }
        },
        uglify: {
            my_target: {
                files: {
                    'assets/js/jp/dist/main.min.js': [
                        'assets/js/jp/*.js',
                        '../journeyPure/assets/js/custom/a_globals.js',
                        '../journeyPure/assets/js/custom/cta-widget.js',
                        '../journeyPure/assets/js/custom/user-question.js',
                        'assets/js/jp/src/*.js'
                    ],

                    'assets/js/jp/dist/bootstrap.min.js': [
                        '../journeyPure/assets/js/vendor/bootstrap.js',
                    ]
                }
            }
        },
        babel: {
            options: {
                sourceMap: true,
                //presets: ['@babel/preset-env']
            },
            dist: {
                files: {
                    'assets/js/jp/dist/main.babel.min.js': 'assets/js/jp/dist/main.min.js',
                }
            },
        },

        watch: {
            options: {
                livereload: true,
				forever: true
            },
            css: {
                files: ['./assets/scss/**','./assets/scss/components/**','./assets/js/jp/src/*.js','./assets/scss/templates/**'],
                tasks: ['sass','uglify','babel']
            },
        },
    });
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-babel');
    grunt.loadNpmTasks('grunt-contrib-uglify-es');

    // Do the Task
    grunt.registerInitTask('default', ['sass','uglify','babel','watch']);
};
