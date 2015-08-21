module.exports = function(grunt){
    grunt.initConfig({
		watch: {
		  	css: {
			    files: '**/*.scss',
			    tasks: ['sass'],
			    options: {
		      		livereload: true,
		    	}
		  	},
		  	js: {
		  		files: 'js/*.js',
		  		tasks: ['uglify'],
		  		options: {
		  			livereload: true,
		  		}
		  	}
		},
		uglify: {
			build: {
				src: ['js/scripts.js'],
				dest: 'js/scripts.min.js'
			}
		},
		sass: {
			dist: {
				options: {
					style: 'expanded' // Output style. Can be: nested, compact, compressed, expanded.
				},
				files: {
					'bower_components/mini.scss/css/main.css': 'bower_components/mini.scss/scss/main.scss',
					'bower_components/mini.scss/css/ie.css': 'bower_components/mini.scss/scss/ie.scss',
					'bower_components/mini.scss/css/home.css': 'bower_components/mini.scss/scss/pages/home.scss',
					'bower_components/mini.scss/css/catalog.css': 'bower_components/mini.scss/scss/pages/catalog.scss',
					'bower_components/mini.scss/css/product.css': 'bower_components/mini.scss/scss/pages/product.scss',
					'bower_components/mini.scss/css/contact.css': 'bower_components/mini.scss/scss/pages/contact.scss',
					'bower_components/mini.scss/css/news.css': 'bower_components/mini.scss/scss/pages/news.scss',
					'bower_components/mini.scss/css/purchase.css': 'bower_components/mini.scss/scss/pages/purchase.scss'
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