module.exports = function(grunt) {

    grunt.initConfig({
  
      compress: {
        main: {
          options: {
            archive: 'notice-trace-log.zip'
          },
          files: [
            {
              expand: true,
              cwd: './', 
              src: [
                '**', 
                '!node_modules/**', 
                '!notice-trace-log.zip',
                '!.git/**',
                '!.gitignore',
                '!.gitattributes',
                '!package.json',
                '!package-lock.json',
                '!Gruntfile.js'
              ],
              dest: 'notice-trace-log/' 
            }
          ]
        }
      }
  
    });
  
    grunt.loadNpmTasks('grunt-contrib-compress');
  
    grunt.registerTask('default', ['compress']);
  };