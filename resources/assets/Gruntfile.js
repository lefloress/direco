module.exports = function(grunt){
    grunt.initConfig({
        watch: {
            css: {
                files: '**/*.scss',
                tasks: ['sass'],
                options: {
                    livereload: true
                }
            },
            js: {
                files: 'js/*.js',
                tasks: ['uglify'],
                options: {
                    livereload: true
                }
            }
        },
        uglify: {
            build: {
                src: ['js/scripts.js', 'js/searcher.js'],
                dest: '../../public/assets/js/scripts.min.js'
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'expanded' // Output style. Can be: nested, compact, compressed, expanded.
                },
                files: {
                    '../../public/assets/css/main.css': 'scss/main.scss',
                    '../../public/assets/css/ie.css': 'scss/ie.scss',
                    '../../public/assets/css/home.css': 'scss/pages/home.scss',
                    '../../public/assets/css/catalog.css': 'scss/pages/catalog.scss',
                    '../../public/assets/css/product.css': 'scss/pages/product.scss',
                    '../../public/assets/css/contact.css': 'scss/pages/contact.scss',
                    '../../public/assets/css/news.css': 'scss/pages/news.scss',
                    '../../public/assets/css/purchase.css': 'scss/pages/purchase.scss',
                    '../../public/assets/css/admin.css': 'scss/admin.scss'
                }
            }
        },
        connect: {
            server: {
                options: {
                    port: 9090,
                    hostname: '*',
                    base: '../'
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-connect');

    grunt.registerTask('default', ['connect', 'watch']);
};