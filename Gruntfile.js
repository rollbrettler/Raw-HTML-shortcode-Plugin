module.exports = function (grunt) {
    "use strict";
    require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        uglify: {
            build: {
                files: {
                    'js/raw-html-shortcode.min.js': [
                        'bower_components/codemirror/lib/codemirror.js',
                        'bower_components/codemirror/addon/hint/show-hint.js',
                        'bower_components/codemirror/addon/hint/xml-hint.js',
                        'bower_components/codemirror/addon/hint/html-hint.js',
                        'bower_components/codemirror/addon/fold/foldcode.js',
                        'bower_components/codemirror/addon/fold/foldgutter.js',
                        'bower_components/codemirror/addon/fold/brace-fold.js',
                        'bower_components/codemirror/addon/fold/xml-fold.js',
                        'bower_components/codemirror/addon/fold/markdown-fold.js',
                        'bower_components/codemirror/addon/fold/comment-fold.js',
                        'bower_components/codemirror/mode/xml/xml.js',
                        'bower_components/codemirror/mode/javascript/javascript.js',
                        'bower_components/codemirror/mode/css/css.js',
                        'bower_components/codemirror/mode/htmlmixed/htmlmixed.js',
                        'js/raw-html-shortcode.js'
                    ]
                }
            }
        },
        
        cssc: {
            build: {
                options: {
                    consolidateViaDeclarations: true,
                    consolidateViaSelectors:    true,
                    consolidateMediaQueries:    true
                },
                files: {
                    'build/style.css': 'build/style.css'
                }
            }
        },

        cssmin: {
            build: {
                src: [
                        'bower_components/codemirror/lib/codemirror.css',
                        'bower_components/codemirror/theme/xq-light.css',
                        'bower_components/codemirror/addon/hint/show-hint.css',
                        'bower_components/codemirror/addon/fold/foldgutter.css'
                    ],
                dest: 'css/raw-html-shortcode.min.css'
            }
        },

        watch: {
            grunt: {
                files: ['Gruntfile.js'],
                tasks: ['default']
            },
            js: {
                files: ['js/raw-html-shortcode.js'],
                tasks: ['uglify']
            }
        }
    });

    grunt.registerTask('build', ['uglify', 'cssmin', 'cssc']);
    grunt.registerTask('default', ['build']);
}