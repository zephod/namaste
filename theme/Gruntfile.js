module.exports = function(grunt) {
  path = require('path');

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    copy: {
      jquery: {
        src: 'src/js/jquery-1.10.2.min.js',
        dest: 'assets/js/jquery-1.10.2.min.js',
      },
      favicon: {
        src: 'src/img/favicon.ico',
        dest: 'assets/img/favicon.ico',
      }
    },
    concat: {
      options: {
        banner: '/*! VENDOR JS */\n'
      },
      vendor_scripts: {
        src: [ /* Order of resources is important */
          'src/js/plugins.js',
          'src/js/vendor/jquery.backstretch.min.js',
          'src/js/modernizr-2.6.2.min.js',
        ],
        dest: 'assets/js/vendor.js'
      },
      vendor_styles: {
        src: [  /* Order of resources is important. */
          'src/style/bootstrap.css',
          'src/style/editor-style.css',
        ],
        dest: 'assets/css/vendor.css'
      }
    },
    uglify: {
      options: {
        banner: '/*! VENDOR JS UGLIFIED */\n'
      },
      vendor_scripts: {
        src: 'assets/js/vendor.js',
        dest: 'assets/js/vendor.min.js'
      },
      app_scripts: {
        src: 'src/js/forrest.js',
        dest: 'assets/js/forrest.min.js'
      }
    },
    less: {
      options: {
        banner: '/* forrest stylesheet */\n',
        yuicompress: true
      },
      app_styles: {
        src: 'src/style/forrest.less',
        dest: 'assets/css/forrest.min.css'
      }
    },
    imagemin: {
      build: {
        options: { 
          optimizationLevel: 3
        },
        files: [
          {
            expand: true,
            src: '*.jpg',
            cwd: 'src/img/',
            dest: 'assets/img/'
          },
          {
            expand: true,
            src: '*.png',
            cwd: 'src/img/',
            dest: 'assets/img/'
          }
        ]
      },
    },
    watch: {
      app_scripts: {
        files: 'src/js/forrest.js',
        tasks: 'uglify:app_scripts'
      },
      app_styles: {
        files: 'src/style/forrest.less',
        tasks: 'less:app_styles'
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('styles', ['concat:vendor_styles','less:app_styles']);
  grunt.registerTask('scripts', ['concat:vendor_scripts','uglify:vendor_scripts','uglify:app_scripts']);
  grunt.registerTask('default', ['copy','styles','scripts','imagemin']);
};
