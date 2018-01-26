module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        uglify: {
            admin: {
                files: {'admin/js/social-share.min.js': 'admin/js/social-share.js'}
            }
        },
        cssmin: {
            admin: {
                files: {'admin/css/dashboard.min.css': 'admin/css/dashboard.css'}
            },
            front: {
                files: {'front/css/social-share.min.css': 'front/css/social-share.css'}
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.registerTask('default', ['uglify', 'cssmin']);
};