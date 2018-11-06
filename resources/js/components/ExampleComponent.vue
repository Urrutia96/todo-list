<template>
    <div>
        <markdown-editor :highlight="true" v-model="content" ref="markdownEditor"></markdown-editor>
        <button @click="handleHtml">html</button>
        {{ content }}
        <div v-html="html">
        </div>
        
    </div>
</template>
 
<script>
    import markdownEditor from 'vue-simplemde/src/markdown-editor'
    import hljs from 'highlight.js';
    window.hljs = hljs;

    export default {
        components: {
            markdownEditor
        },
        computed: {
            simplemde() {
                return this.$refs.markdownEditor.simplemde;
            },
        },
        data (){
            return {
                content: '',
                html: ''

            }
        },
        methods:{
            handleHtml(){
                this.html = this.simplemde.markdown(this.content);
            }
        }
    }
</script>
 
<style>
    /*@import '~simplemde-theme-base/dist/simplemde-theme-base.min.css'; */
    @import '~simplemde/dist/simplemde.min.css';
    @import '~highlight.js/styles/atom-one-dark.css';
</style>