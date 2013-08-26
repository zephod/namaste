module.exports = function(grunt) {
  path = require('path');

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    copy: {
      jquery: {
        src: 'theme/src/js/jquery-1.10.2.min.js',
        dest: 'theme/build/js/jquery-1.10.2.min.js',
      },
      font: {
        expand: true,
        src: '*',
        cwd: 'theme/src/font/',
        dest: 'theme/build/font/'
      },
    },
    concat: {
      options: {
        banner: '/*! VENDOR JS */\n'
      },
      vendor_scripts: {
        src: [ /* Order of resources is important */
          'theme/src/js/plugins.js',
          'theme/src/js/vendor/jquery.backstretch.min.js',
          'theme/src/js/modernizr-2.6.2.min.js',
        ],
        dest: 'theme/build/js/vendor.js'
      },
    },
    cssmin: {
      options: { banner: '/*! VENDOR css */\n', },
      vendor: {
        src: [  /* Order of resources is important. */
          'theme/src/style/bootstrap.css',
          'theme/src/style/font-awesome.css',
          'theme/src/style/editor-style.css',
        ],
        dest: 'theme/build/css/vendor.min.css'
      },
    },
    uglify: {
      options: {
        banner: '/*! VENDOR JS UGLIFIED */\n'
      },
      vendor_scripts: {
        src: 'theme/build/js/vendor.js',
        dest: 'theme/build/js/vendor.min.js'
      },
      app_scripts: {
        src: 'theme/src/js/forrest.js',
        dest: 'theme/build/js/forrest.min.js'
      }
    },
    less: {
      options: {
        banner: '/* forrest stylesheet */\n',
        yuicompress: true
      },
      app_styles: {
        src: 'theme/src/style/forrest.less',
        dest: 'theme/build/css/forrest.min.css'
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
            cwd: 'media/src/',
            dest: 'media/build/'
          },
          {
            expand: true,
            src: '*.png',
            cwd: 'media/src/',
            dest: 'media/build/'
          },
          {
            expand: true,
            src: '*.jpg',
            cwd: 'theme/src/img/',
            dest: 'theme/build/img/'
          },
          {
            expand: true,
            src: '*.png',
            cwd: 'theme/src/img/',
            dest: 'theme/build/img/'
          }
        ]
      },
    },
    watch: {
      app_scripts: {
        files: 'theme/src/js/forrest.js',
        tasks: 'uglify:app_scripts'
      },
      app_styles: {
        files: 'theme/src/style/forrest.less',
        tasks: 'less:app_styles'
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('styles', ['cssmin:vendor','less:app_styles']);
  grunt.registerTask('scripts', ['copy:jquery','concat:vendor_scripts','uglify:vendor_scripts','uglify:app_scripts']);
  grunt.registerTask('default', ['styles','scripts','imagemin','copy:font']);
};
