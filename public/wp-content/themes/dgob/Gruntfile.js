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
				globals: {}
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
				tasks: ['sass']
			},
			gruntfile: {
				files: ['Gruntfile.js'],
				tasks: ['jshint:gruntfile', 'concat', 'sass']
			},
			scripts: {
				files: ['scripts/**/*.js'],
				tasks: ['jshint:dist', 'concat']
			}
		},
		sass: {
			dist: {
				options: {
					style: 'expanded'
				},
				files: [{
					expand: true,
					cwd: 'styles',
					src: ['*.scss'],
					dest: '.',
					ext: '.css'
				}]
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
					'<%= pkg.paths.bootstrap %>/assets/javascripts/bootstrap/transition.js',
					'<%= pkg.paths.bootstrap %>/assets/javascripts/bootstrap/collapse.js',
					'<%= pkg.paths.bootstrap %>/assets/javascripts/bootstrap/dropdown.js'
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

	grunt.registerTask('default', [
		'jshint',
		'copy',
		'concat',
		'sass'
	]);

};
