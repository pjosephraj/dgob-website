/*global module:false*/
module.exports = function (grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		jshint: {
			options: {
				curly: true,
				eqeqeq: true,
				immed: true,
				latedef: true,
				newcap: true,
				noarg: true,
				sub: true,
				undef: true,
				unused: true,
				boss: true,
				eqnull: true,
				browser: true,
				globals: {
					'$': false
				}
			},
			dist: {
				src: 'scripts/**/*.js'
			},
			gruntfile: {
				src: 'Gruntfile.js'
			}
		},
		watch: {
			sass: {
				files: ['styles/**/*.scss'],
				tasks: ['css']
			},
			gruntfile: {
				files: ['Gruntfile.js'],
				tasks: ['jshint:gruntfile', 'concat', 'css']
			},
			scripts: {
				files: ['scripts/**/*.js'],
				tasks: ['jshint:dist', 'concat']
			}
		},
		sass: {
			dist: {
				options: {
					style: 'expanded',
					sourcemap: 'none'
				},
				files: [{
					expand: true,
					cwd: 'styles',
					src: ['*.scss'],
					dest: '.tmp',
					ext: '.css'
				}]
			}
		},
		cssmin: {
			dist: {
				files: {
					'style.css': [
						'.tmp/style.css',
						'<%= pkg.paths.wgo %>/wgo/wgo.player.css'
					]
				}
			}
		},
		copy: {
			fonts: {
				files: [{
					expand: true,
					cwd: '<%= pkg.paths.bootstrap %>/assets/fonts/',
					src: ['**'],
					dest: 'fonts/'
				}]
			}
		},
		concat: {
			options: {
				sourceMap: true
			},
			dist: {
				src: [
					'<%= pkg.paths.jquery %>/dist/jquery.js',
					'<%= pkg.paths.clusterer %>/src/markerclusterer.js',
					'<%= pkg.paths.bootstrap %>/assets/javascripts/bootstrap/transition.js',
					'<%= pkg.paths.bootstrap %>/assets/javascripts/bootstrap/collapse.js',
					'<%= pkg.paths.bootstrap %>/assets/javascripts/bootstrap/dropdown.js',
					'scripts/game-evenings.js',
					'<%= pkg.paths.wgo %>/wgo/wgo.min.js',
					'<%= pkg.paths.wgo %>/wgo/wgo.player.min.js',
					'<%= pkg.paths.wgo %>/i18n/i18n.de.js'
				],
				dest: 'scripts.js'
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-cssmin');

	grunt.registerTask('css', [
		'sass',
		'cssmin'
	]);

	grunt.registerTask('default', [
		'jshint',
		'copy',
		'concat',
		'css'
	]);

};
