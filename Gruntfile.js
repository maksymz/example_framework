module.exports = function(grunt) {
    grunt.initConfig({
        less: {
            dev: {
                options: {
                    compress: false,
                    yuicompress: false,
                    optimization: 2,
                    strictImports: true,
                    sourceMap: true,
                    sourceMapFilename: 'pub/css/styles.css.map', // where file is generated and located
                    sourceMapURL: 'styles.css.map', // the complete url and filename put in the compiled css file
                    sourceMapBasepath: 'pub', // Sets sourcemap base path, defaults to current working directory.
                    sourceMapRootpath: '/', // adds this path onto the sourcemap filename and less file paths
                },
                files: {
                    "pub/css/styles.css": "assets/less/styles.less"
                }
            },
            prod: {
                options: {
                    compress: false,
                    yuicompress: false,
                    optimization: 2,
                    strictImports: true
                },
                files: {
                    "var/styles.css": "assets/less/styles.less"
                }
            }
        },

        postcss: {
            dev: {
                options: {
                    map: true,
                    processors: [
                        require('autoprefixer')({
                            overrideBrowserslist: ['last 2 versions',  'ie 11']
                        })
                    ]
                },
                src: 'pub/css/styles.css',
                dest: 'pub/css/styles.min.css'
            },

            prod: {
                options: {
                    processors: [
                        require('autoprefixer')({
                            overrideBrowserslist: ['last 2 versions',  'ie 11']
                        }),
                        require('cssnano')()
                    ]
                },
                src: 'var/styles.css',
                dest: 'pub/css/styles.min.css'
            }
        },

        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'assets/images/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'pub/images/'
                }]
            }
        },

        watch: {
            less: {
                files: ['assets/less/**/*.less'],
                tasks: ['less:dev', 'postcss:dev']
            },
            css: {
                files: ['pub/css/*.min.css'],
                options: {
                    livereload: true,
                }
            },
            imagemin: {
                files: 'assets/images/**/*.{png,jpg,gif}',
                tasks: ['imagemin']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['less:prod', 'postcss:prod', 'imagemin']);
    grunt.registerTask('dev', ['less:dev', 'postcss:dev', 'imagemin', 'watch']);
};
