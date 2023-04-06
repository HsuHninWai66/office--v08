@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3 class="ml-3" style="color:#3f51b5;">Maileclipse <small><i class="fa fa-envelope"></i></small></h3>
        </div>

        <div class="title_right">
        <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
            <span class="input-group-btn">
            {{-- <a class="btn" type="button" href="{{ url('staff/list')}}" style="background-color:#3f51b5;color:#fff;"><span class="fa fa-arrow-left pr-2"> </span>Go to lists</a> --}}
            </span>
            </div>
        </div>
        </div>
    </div>

    <div class="clearfix"></div>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:#d4edda;color:#155724;">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span span="" aria-hidden="true">×</span>
            </button>
        </div>
        @endif


    <div class="row">
        <div class="col-md-8 col-sm-8 m-0-auto">

            <style type="text/css">

                .CodeMirror {
                    height: 400px;
                }

                .editor-preview-active,
                .editor-preview-active-side {
                    /*display:block;*/
                }
                .editor-preview-side>p,
                .editor-preview>p {
                    margin:inherit;
                }
                .editor-preview pre,
                .editor-preview-side pre {
                     background:inherit;
                     margin:inherit;
                }
                .editor-preview table td,
                .editor-preview table th,
                .editor-preview-side table td,
                .editor-preview-side table th {
                 border:inherit;
                 padding:inherit;
                }
                .view_data_param {
                    cursor: pointer;
                }

             </style>

        <div class="col-lg-12 col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('templateList') }}">Templates</a></li>
                <li class="breadcrumb-item active">{{ ucfirst($skeleton['type']) }}</li>
                <li class="breadcrumb-item active">{{ ucfirst($skeleton['name']) }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($skeleton['skeleton']) }}</li>
              </ol>
            </nav>
                <div class="container">
                    <div class="row my-4">

                        <div class="col-md-12">

                            <div class="card mb-2">
                                <div class="card-header p-3" style="border-bottom:1px solid #e7e7e7e6;">
                                    <button type="button" class="btn btn-primary float-right save-template">Create</button>
                                    <button type="button" class="btn btn-secondary float-right preview-toggle mr-2"><i class="far fa-eye"></i> Preview</button>
                                </div>
                            </div>

                            <div class="card">

                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Editor</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Plain Text</a>
                              </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <textarea id="template_editor" cols="30" rows="10">{{ $skeleton['template'] }}</textarea>
                              </div>
                              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <textarea id="plain_text" cols="30" rows="10"></textarea>
                              </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
         </div>

        <script type="text/javascript">


        $(document).ready(function(){

                    @if ($skeleton['type'] === 'markdown')


                    var simplemde = new SimpleMDE(
                        {
                        element: $("#template_editor")[0],
                        toolbar: [
                        {
                                name: "bold",
                                action: SimpleMDE.toggleBold,
                                className: "fa fa-bold",
                                title: "Bold",
                        },
                        {
                                name: "italic",
                                action: SimpleMDE.toggleItalic,
                                className: "fa fa-italic",
                                title: "Italic",
                        },
                        {
                                name: "strikethrough",
                                action: SimpleMDE.toggleStrikethrough,
                                className: "fa fa-strikethrough",
                                title: "Strikethrough",
                        },
                        {
                                name: "heading",
                                action: SimpleMDE.toggleHeadingSmaller,
                                className: "fa fa-header",
                                title: "Heading",
                        },
                        {
                                name: "code",
                                action: SimpleMDE.toggleCodeBlock,
                                className: "fa fa-code",
                                title: "Code",
                        },

                        "|",
                        {
                                name: "unordered-list",
                                action: SimpleMDE.toggleBlockquote,
                                className: "fa fa-list-ul",
                                title: "Generic List",
                        },
                        {
                                name: "uordered-list",
                                action: SimpleMDE.toggleOrderedList,
                                className: "fa fa-list-ol",
                                title: "Numbered List",
                        },
                        {
                                name: "clean-block",
                                action: SimpleMDE.cleanBlock,
                                className: "fa fa-eraser fa-clean-block",
                                title: "Clean block",
                        },
                        "|",
                        {
                                name: "link",
                                action: SimpleMDE.drawLink,
                                className: "fa fa-link",
                                title: "Create Link",
                        },
                        {
                                name: "image",
                                action: SimpleMDE.drawImage,
                                className: "fa fa-picture-o",
                                title: "Insert Image",
                        },
                        {
                                name: "horizontal-rule",
                                action: SimpleMDE.drawHorizontalRule,
                                className: "fa fa-minus",
                                title: "Insert Horizontal Line",
                        },
                        "|",
                        {
                            name: "button-component",
                            action: setButtonComponent,
                            className: "fa fa-hand-pointer-o",
                            title: "Button Component",
                        },
                        {
                            name: "table-component",
                            action: setTableComponent,
                            className: "fa fa-table",
                            title: "Table Component",
                        },
                        {
                            name: "promotion-component",
                            action: setPromotionComponent,
                            className: "fa fa-bullhorn",
                            title: "Promotion Component",
                        },
                        {
                            name: "panel-component",
                            action: setPanelComponent,
                            className: "fa fa-thumb-tack",
                            title: "Panel Component",
                        },
                        "|",
                        {
                                name: "side-by-side",
                                action: SimpleMDE.toggleSideBySide,
                                className: "fa fa-columns no-disable no-mobile",
                                title: "Toggle Side by Side",
                        },
                        {
                                name: "fullscreen",
                                action: SimpleMDE.toggleFullScreen,
                                className: "fa fa-arrows-alt no-disable no-mobile",
                                title: "Toggle Fullscreen",
                        },
                        {
                                name: "preview",
                                action: SimpleMDE.togglePreview,
                                className: "fa fa-eye no-disable",
                                title: "Toggle Preview",
                        },
                        ],
                        renderingConfig: { singleLineBreaks: true, codeSyntaxHighlighting: true,},
                        hideIcons: ["guide"],
                        spellChecker: false,
                        promptURLs: true,
                        placeholder: "Write your Beautiful Email",

                        previewRender: function(plainText, preview) {
                             // return preview.innerHTML = 'sacas';
                            $.ajax({
                                  method: "POST",
                                  url: "{{ route('previewTemplateMarkdownView') }}",
                                  data: { markdown: plainText, name: 'new' }

                            }).done(function( HtmledTemplate ) {
                                preview.innerHTML = HtmledTemplate;
                            });

                            return '';
                        },

                    });

                    function setButtonComponent(editor) {

                        link = prompt('Button Link');

                        var cm = editor.codemirror;
                        var output = '';
                        var selectedText = cm.getSelection();
                        var text = selectedText || 'Button Text';

                        output = `
        [component]: # ('mail::button',  ['url' => '`+ link +`'])
        ` + text + `
        [endcomponent]: #
                        `;
                        cm.replaceSelection(output);

                    }

                    function setPromotionComponent(editor) {

                        var cm = editor.codemirror;
                        var output = '';
                        var selectedText = cm.getSelection();
                        var text = selectedText || 'Promotion Text';

                        output = `
        [component]: # ('mail::promotion')
        ` + text + `
        [endcomponent]: #
                        `;
                        cm.replaceSelection(output);

                    }

                    function setPanelComponent(editor) {

                        var cm = editor.codemirror;
                        var output = '';
                        var selectedText = cm.getSelection();
                        var text = selectedText || 'Panel Text';

                        output = `
        [component]: # ('mail::panel')
        ` + text + `
        [endcomponent]: #
                        `;
                        cm.replaceSelection(output);

                    }

                    function setTableComponent(editor) {

                        var cm = editor.codemirror;
                        var output = '';
                        var selectedText = cm.getSelection();

                        output = `
        [component]: # ('mail::table')
        | Laravel       | Table         | Example  |
        | ------------- |:-------------:| --------:|
        | Col 2 is      | Centered      | $10      |
        | Col 3 is      | Right-Aligned | $20      |
        [endcomponent]: #
                        `;
                        cm.replaceSelection(output);

                    }

                    $('.preview-toggle').click(function(){
                        simplemde.togglePreview();
                        $(this).toggleClass('active');
                    });

                    @else

                    tinymce.init({
                        selector: "textarea#template_editor",
                        menubar : false,
                        visual: false,
                        height:600,
                        inline_styles : true,
                        plugins: [
                             "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                             "save table directionality emoticons template paste fullpage code legacyoutput"
                       ],
                       content_css: "css/content.css",
                       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image fullpage | forecolor backcolor emoticons | preview | code",
                       fullpage_default_encoding: "UTF-8",
                       fullpage_default_doctype: "<!DOCTYPE html>",
                       init_instance_callback: function (editor)
                       {
                        setTimeout(function(){
                            editor.execCommand("mceRepaint");
                        }, 5000);
                       }
                    });




                    $('.preview-toggle').click(function(){
                        tinyMCE.execCommand('mcePreview');return false;
                    });

                    @endif

                    $('.save-template').click(function(){

                        notie.input({
                          text: 'Enter the template name:',
                          type: 'text',
                          placeholder: 'e.g. Weekly Newsletter',
                          allowed: new RegExp('[^a-zA-Z0-9 ]', 'g'),
                          submitCallback: function (templatename) {

                            notie.input({

                          text: 'Enter the template description:',
                          type: 'text',
                          submitText: 'Create Template',
                          cancelText: 'Cancel',
                          allowed: new RegExp('[^a-zA-Z0-9 ]', 'g'),
                          submitCallback: function (templatedescription) {

                            @if ($skeleton['type'] === 'markdown')

                            var postData = {
                                content: simplemde.codemirror.getValue(),
                                template_name: templatename,
                                template_description: templatedescription,
                                plain_text: plaintextEditor.getValue(),
                                template_view_name: '{{ $skeleton['name'] }}',
                                template_type: '{{ $skeleton['type'] }}',
                                template_skeleton: '{{ $skeleton['skeleton'] }}',
                            }

                            @else

                            var postData = {
                                content: tinymce.get('template_editor').getContent(),
                                template_name: templatename,
                                template_description: templatedescription,
                                plain_text: plaintextEditor.getValue(),
                                template_view_name: '{{ $skeleton['name'] }}',
                                template_type: '{{ $skeleton['type'] }}',
                                template_skeleton: '{{ $skeleton['skeleton'] }}',
                            }

                            @endif


                                axios.post('{{ route('createNewTemplate') }}', postData)

                            .then(function (response) {

                                if (response.data.status == 'ok'){

                                    notie.alert({ type: 1, text: response.data.message, time: 3 });

                                    setTimeout(function(){
                                        window.location.replace(response.data.template_url);
                                    }, 1000);

                                } else {
                                    notie.alert({ type: 'error', text: response.data.message, time: 2 })
                                }
                            })

                            .catch(function (error) {
                                notie.alert({ type: 'error', text: error, time: 2 })
                            });
                          }

                      });

                     },

                    });

                    });


                    var plaintextEditor = CodeMirror.fromTextArea(document.getElementById("plain_text"), {
                        lineNumbers: false,
                        mode: 'plain/text',
                        placeholder: "Email Plain Text Version (Optional)",
                    });

                });


        </script>

        </div>

        </div>
        </div>
    </div>
        </div>
        </div>


        </div>
        </div>
    </div>
    </div>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Warning!</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-danger">Are you sure? Do you want to delete department?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary px-2 mr-1 rounded-0" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-sm btn-danger px-2 mr-1 rounded-0" id="deletePosition" onclick="">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
@include('layout.footer')

<script>
    $(document).ready( function () {
        $(".deleteBtn").click(function() {
            $("#myModal").modal('show');
            let dd = $(this).data('link');
            $('#deletePosition').attr('onclick', `location.href='{{ url('department/delete') }}/${dd}'`);
         });
    });
</script>
