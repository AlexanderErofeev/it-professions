import { ClassicEditor as ClassicEditorBase } from '@ckeditor/ckeditor5-editor-classic';
import '@ckeditor/ckeditor5-build-classic/build/translations/ru'
import { Alignment } from '@ckeditor/ckeditor5-alignment';
import { Autoformat } from '@ckeditor/ckeditor5-autoformat';
import { Autosave } from '@ckeditor/ckeditor5-autosave';
import { BalloonEditor } from '@ckeditor/ckeditor5-editor-balloon';
import { Bold, Code, Italic, Strikethrough, Subscript, Superscript, Underline } from '@ckeditor/ckeditor5-basic-styles';
import { BlockQuote } from '@ckeditor/ckeditor5-block-quote';
import { CKFinder, CKFinderUI } from '@ckeditor/ckeditor5-ckfinder';
import { CKFinderUploadAdapter } from '@ckeditor/ckeditor5-adapter-ckfinder';
import { Essentials } from '@ckeditor/ckeditor5-essentials';
import { Heading } from '@ckeditor/ckeditor5-heading';
import {
    Image,
    ImageCaption,
    ImageStyle,
    ImageToolbar,
    ImageUpload,
    ImageResize,
} from '@ckeditor/ckeditor5-image';
import { Indent } from '@ckeditor/ckeditor5-indent';
import { Link } from '@ckeditor/ckeditor5-link';
import { List } from '@ckeditor/ckeditor5-list';
import { MediaEmbed } from '@ckeditor/ckeditor5-media-embed';
import { Paragraph } from '@ckeditor/ckeditor5-paragraph';
import { PasteFromOffice } from '@ckeditor/ckeditor5-paste-from-office';
import { Table, TableToolbar } from '@ckeditor/ckeditor5-table';
import { TextTransformation } from '@ckeditor/ckeditor5-typing';
import { SimpleUploadAdapter } from '@ckeditor/ckeditor5-upload/';

export default class ClassicEditor extends ClassicEditorBase {}

ClassicEditor.builtinPlugins = [
    Alignment,
    Autoformat,
    Autosave,
    BalloonEditor,
    BlockQuote,
    Bold,
    CKFinder,
    CKFinderUI,
    CKFinderUploadAdapter,
    Code,
    Essentials,
    Heading,
    Image,
    ImageCaption,
    ImageStyle,
    ImageToolbar,
    ImageUpload,
    ImageResize,
    Indent,
    Italic,
    Link,
    List,
    MediaEmbed,
    Paragraph,
    PasteFromOffice,
    SimpleUploadAdapter,
    Strikethrough,
    Subscript,
    Superscript,
    Table,
    TableToolbar,
    TextTransformation,
    Underline
];

ClassicEditor.defaultConfig = {
    balloonToolbar: ['bold', 'italic', '|', 'link'],
    toolbar: {
        items: [
            'alignment',
            'heading',
            '|',
            'bold',
            'code',
            'italic',
            'strikethrough',
            'subscript',
            'superscript',
            'underline',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'indent',
            '|',
            'imageUpload',
            'ckfinder',
            'blockQuote',
            'insertTable',
            'mediaEmbed',
            'undo',
            'redo'
        ]
    },
    language: 'ru',
    image: {
        // Configure the available styles.
        styles: [
            'alignLeft', 'alignCenter', 'alignRight', 'alignBlockLeft', 'alignBlockRight'
        ],
        // Configure the available image resize options.
        resizeOptions: [
            {
                name: 'imageResize:original',
                label: 'Original',
                value: null
            },
            {
                name: 'imageResize:25',
                label: '25%',
                value: '25'
            },
            {
                name: 'imageResize:50',
                label: '50%',
                value: '50'
            },
            {
                name: 'imageResize:75',
                label: '75%',
                value: '75'
            }
        ],
        toolbar: [
            'imageTextAlternative',
            'toggleImageCaption',
            '|',
            'imageResize',
            '|',
            {
                name: 'Выравнивание в строке',
                title: 'Выравнивание в строке',
                items: [
                    'imageStyle:alignBlockLeft',
                    'imageStyle:alignCenter',
                    'imageStyle:alignBlockRight',
                ],
                defaultItem: 'imageStyle:alignBlockLeft'
            },
            '|',
            {
                name: 'Обтекание текста',
                title: 'Обтекание текста',
                items: [
                    'imageStyle:alignLeft',
                    'imageStyle:alignRight',
                ],
                defaultItem: 'imageStyle:alignLeft'
            },
        ]
    },
    table: {
        contentToolbar: [
            'tableColumn',
            'tableRow',
            'mergeTableCells'
        ]
    },
    mediaEmbed: {
        previewsInData: true
    },
    simpleUpload: {
        uploadUrl: '/upload_img',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    }
};

/*
ClassicEditor
    // Note that you do not have to specify the plugin and toolbar configuration — using defaults from the build.
    .create( document.querySelector( '#ckeditor' ))
    .then( editor => {
        console.log( 'Editor was initialized', editor );
    } )
    .catch( error => {
        console.error( error.stack );
    } );
*/
ClassicEditor.create( document.querySelector( '#ckeditor' ));

