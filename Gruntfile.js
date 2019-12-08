module.exports = function (grunt) {
    // grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-notify');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-copy');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    var target = grunt.option('target');

    var dir = grunt.option('target');
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                sourceMap: true,
                style: 'compressed'
            },
            all: {
                src: target + '/css/main.scss',
                dest: target + '/css/main.css',
            },


            all1: {
                src: dir + '/scss/main.scss',
                dest: dir + '/css/main.css',
            },


            toan: {
                src: 'html/wp/iwpserver/htdocs/wordpress/wp-content/themes/greeky/css/main.scss',
                dest: 'html/wp/iwpserver/htdocs/wordpress/wp-content/themes/greeky/css/main.css',
            },

            db_new: {
                src: 'html/db_new/css/main.scss',
                dest: 'html/db_new/css/main.css',
            },
            amos: {
                src: 'html/amos/sass/style.scss',
                dest: 'html/amos/css/style.css',
            },


            admin: {
                src: 'html/demo/scss/main.scss',
                dest: 'html/demo/css/main.css',
            },
            basetom: {
                src: 'html/html2019/scss/pages/owner-car-submit.scss',
                dest: 'html/html2019/css/owner-car-submit.css',
            },

        },
        autoprefixer: {
            files: {
                src: 'D:/Workspace/html/example/html/db/css/main.css',
                dest: 'D:/Workspace/html/example/html/db/css/main.css',
            },
        },

        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: target + '/css',
                    src: ['*.css', '!*.min.css'],
                    dest: target + '/css',
                    ext: '.min.css'
            }]
            }

        },

        notify: {
            watch_concat: {
                options: {
                    title: 'Task Complete', // optional 
                    message: 'SASS and Uglify finished running', //required 
                }
            }
        },
        browserSync: {
            all: {
                bsFiles: {
                    src: [target + '/css/*.scss', target + '/css/scss/*.scss', target + '/*.html'],
                },
                options: {
                    server: {
                        baseDir: "./" + target,
                        directory: true
                        // baseDir: "./"
                    },
                    watchTask: true,
                    reloadDelay: 3000
                },
            },

            all1: {
                bsFiles: {
                    src: [dir + '/scss/*.scss', dir + '/scss/*/*.scss', target + '/*.html'],
                },
                options: {
                    server: {
                        baseDir: "./" + target,
                        directory: true
                        // baseDir: "./"
                    },
                    watchTask: true,
                    reloadDelay: 3000
                },
            },
            toan: {
                bsFiles: {
                    src: ['html/wp/iwpserver/htdocs/wordpress/wp-content/themes/greeky/css/*.scss', 'html/doctor/*.html'],
                },
                options: {
                    server: {
                        baseDir: "./html/doctor"
                        // baseDir: "./"
                    },
                    watchTask: true,
                    reloadDelay: 3000
                },
            },

            db_new: {
                bsFiles: {
                    src: ['html/db_new/css/scss/*.scss', 'html/db_new/css/scss/*/*.scss', 'html/db_new/*.html'],
                },
                options: {
                    server: {
                        baseDir: "./html/db_new",
                        directory: true
                        // baseDir: "./"
                    },
                    watchTask: true,
                    reloadDelay: 3000
                },
            },

            amos: {
                bsFiles: {
                    src: ['html/amos/sass/*.scss', 'html/db_new/css/scss/shared/*.scss', 'html/db_new/css/scss/pages/*.scss', 'html/db_new/css/scss/components/*.scss', 'html/db_new/*.html'],
                },
                options: {
                    server: {
                        baseDir: "./html/db_new"
                        // baseDir: "./"
                    },
                    watchTask: true,
                    reloadDelay: 3000
                },
            },

            admin: {


                bsFiles: {
                    src: ['html/demo/scss/*.scss', 'html/demo/scss/*/*.scss', 'html/demo/*.html'],
                },
                options: {
                    server: {
                        baseDir: "./html/demo"
                        // baseDir: "./"
                    },
                    watchTask: true,
                    reloadDelay: 3000
                },
            },
            basetom: {
                bsFiles: {
                    src: ['html/html2019/scss/pages/*.scss', 'html/html2019/*.html'],
                },
                options: {
                    server: {
                        baseDir: "./html/html2019"
                        // baseDir: "./"
                    },
                    watchTask: true,
                    reloadDelay: 3000
                },
            }
        },
        watch: {
            all: {
                files: [target + '/css/*.scss', target + '/css/scss/*.scss', target + '/*.html'],
                tasks: ['sass:all', 'cssmin'],
            },

            all1: {
                files: [dir + '/scss/*.scss', dir + '/scss/*/*.scss', dir + '/*.html'],
                tasks: ['sass:all1', 'cssmin'],
            },
            toan: {
                files: ['html/wp/iwpserver/htdocs/wordpress/wp-content/themes/greeky/css/*.scss', 'html/doctor/*.html'],
                tasks: ['sass:toan'],
            },

            db_new: {
                files: ['html/db_new/css/scss/*.scss', 'html/db_new/css/scss/*/*.scss', 'html/db_new/*.html'],
                tasks: ['sass:db_new'],
            },

            amos: {
                files: ['html/amos/sass/*.scss', 'html/db_new/css/scss/shared/*.scss', 'html/db_new/css/scss/pages/*.scss', 'html/db_new/css/scss/components/*.scss', 'html/db_new/*.html'],
                tasks: ['sass:amos'],
            },
            admin: {



                files: [' html/demo/scss/*.scss', ' html/demo/scss/*/*.scss', ' html/demo/*.html'],
                tasks: ['sass:admin'],
            },
            basetom: {
                files: ['html/html2019/scss/pages/*.scss', 'html/basetom/*.html', 'html/basetom/scss/grid/*.scss', ],
                tasks: ['sass:basetom'],
            }
        },
        copy: {
            files: {
                'dest/default_options': ['D:/test.txt', 'D:/demo/test.txt'],
            },
        },
    });
    grunt.registerTask('default', ['browserSync', 'watch']);
    grunt.registerTask('copy1', 'copy');
    grunt.registerTask('css', 'Grunt css', function () {
        grunt.task.run(['browserSync:all', 'watch:all']);
    });

    grunt.registerTask('scss', 'Grunt scss', function () {
        grunt.task.run(['browserSync:all1', 'watch:all1']);
    });
    grunt.registerTask('toan', ['browserSync:toan', 'watch:toan']);
    grunt.registerTask('db_new', ['browserSync:db_new', 'watch:db_new']);

    grunt.registerTask('amos', ['browserSync:amos', 'watch:amos']);
    grunt.registerTask('admin', ['browserSync:admin', 'watch:admin']);
    grunt.registerTask('basetom', ['browserSync:basetom', 'watch:basetom']);
    grunt.registerTask('prefix', 'autoprefixer');
    grunt.registerTask('min', 'cssmin');
};
