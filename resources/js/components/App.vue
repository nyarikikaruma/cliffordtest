<template>
    <div class="container mx-auto px-4 py-8 max-w-lg">
        <div class="rounded-lg shadow-lg p-8">
            <h1 class="text-2xl font-bold mb-8 text-center">Fetch Post Comment</h1>
            <div class="grid grid-cols-1 gap-8">
                <div>
                    <label
                        for="first_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Enter Post id</label
                    >
                    <input
                        type="text"
                        id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Post ID"
                        v-model="postId"
                        required
                    />
                </div>
                <button @click="fetchPostComment" class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">
                Fetch
            </button>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 py-8 max-w-lg">
        <div class="rounded-lg shadow-lg p-8">
            <h1 class="text-2xl font-bold mb-8 text-center">Fetch Page Comment</h1>
            <div class="grid grid-cols-1 gap-8">
                <div>
                    <label
                        for="first_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Enter Page id</label
                    >
                    <input
                        type="text"
                        id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Page ID"
                        v-model="pageId"
                        required
                    />
                </div>
                <button @click="fetchPageComment" class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">
                Fetch
            </button>
            </div>
        </div>
        <div v-for="(item, index) in comments" :key="index" class="rounded-lg shadow-lg p-4">
                    <!-- <div class="flex justify-between items-center mb-2"> -->
                        <h1 class="text-lg font-bold underline">Comment</h1>

                        <h3 class="text-sm font-bold">{{item.body}}</h3>
                        <h1 class="text-lg font-bold underline">Commentable Type</h1>
                        <span class="text-lg">{{item.commentable_type}}</span>

                    <!-- </div> -->
                </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            comments : [],
            postId: '',
            pageId: ''


        }
    },

    methods: {
        fetchPostComment(){
            this.comments= []
            this.pageId = ''
            axios.get('http://127.0.0.1:8000/api/posts/' + this.postId)
            .then(response => {
                console.log(response.data);
                this.comments = response.data;
            })
        },
        fetchPageComment(){
            this.comments= []
            this.postId = ''
            axios.get('http://127.0.0.1:8000/api/pages/' + this.pageId)
            .then(response => {
                console.log(response.data);
                this.comments = response.data;
            })
        }
    },
};
</script>
<style lang=""></style>
