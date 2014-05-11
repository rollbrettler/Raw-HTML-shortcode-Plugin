;jQuery(document).ready(function() {
    editor = CodeMirror.fromTextArea(document.getElementById("raw_html_content"), {
        mode: "text/html",
        extraKeys: {
            "Ctrl-Space": "autocomplete"
        },
        theme: "xq-light",
        lineWrapping: true,
        foldGutter: true,
        gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
        lineNumbers: true
    });
});