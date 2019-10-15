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
                    cwd: './assets/css/',
                    src: ['style.scss'],
                    dest: './',
                    ext: '.css'
                }
                ]
            }
        },
        htmlclean: {
            deploy: {
                expand: true,
                cwd: './assets/src',
                src: '**/*.php',
                dest: './'
            },
        },
        watch: {
            options: {
                livereload: true,
				forever: true
            },
            css: {
                files: ['./assets/**'],
                tasks: ['sass','htmlclean']
            },
        },
    });
    grunt.loadNpmTasks('grunt-htmlclean');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-forever');

    // Do the Task
    grunt.registerInitTask('default', ['sass','htmlclean','watch']);
};
