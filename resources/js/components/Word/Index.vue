<template>
    <div>
        <div class="mt-4">
            <h3>Список слов</h3>
            <div class="search">
                <input class="form-control mt-2 w-25" type="text" v-model="search" placeholder="search...">
            </div>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">En</th>
                    <th scope="col">Ru</th>
                    <th scope="col">Phrase</th>
                    <th scope="col">Reting</th>
                    <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="wrapp-word" v-for="(word, index) in sortedApi" v-show="word.visible" :key="index">
                        <td>
                            <p v-if="editWord == 0">{{ word.en }}</p>
                            <input class="form-control" @keyup="updateWord(word.id, $event)" v-if="editWord == 1" type="text" :value="word.en">
                        </td>

                        <td>
                            <p v-if="editWord == 0">{{ word.ru }}</p>
                            <input class="form-control" @keyup="updateWord(word.id, $event)" v-if="editWord == 1" type="text" :value="word.ru">
                        </td>

                        <td>
                            <p v-if="editWord == 0">{{ word.phrase }}</p>
                            <input class="form-control" @keyup="updateWord(word.id, $event)" v-if="editWord == 1" type="text" :value="word.phrase">
                        </td>

                        <td><span @click="updateRating(word.id, n, index)" v-for="(n, index) in 5" :class="{active: n <= word.rating}" :key="index">★</span></td>

                        <td>
                            <button @click="editWord = 1" v-if="editWord == 0" class="btn btn-primary">Редактировать/Удалить</button>
                            <button v-if="editWord == 1" @click="deleteWord(word.id)" class="btn btn-danger">удалить</button>
                            <button @click="editWord = 0" v-if="editWord == 1" class="btn btn-primary">Отмена</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
    export default {
        name: "Index",
        data() {
            return {
                api: [],
                editWord: 0,
                search: null,
            }
        },

        beforeMount() {
            this.getWords()
        },

        methods: {
            getWords() {
                axios.get('/api/words')
                .then( res => {
                    this.api = res.data
                })
            },

            updateWord(id) {

            },

            deleteWord(id) {

            },

            updateRating(id, n, index) {

            }
        },

        computed: {
            sortedApi() {
                let output = []
                for (let key in this.api) {
                    let visible = true
                    if (this.search) {
                        visible = this.api[key].en.toLowerCase().includes(this.search.toLowerCase()) ||
                            this.api[key].ru.toLowerCase().includes(this.search.toLowerCase())
                    }
                    output[key] = {
                        visible: visible,
                        ...this.api[key]
                    }
                }
                // console.log(output)
                return output.sort((a, b) => (a.rating > b.rating) ? 1 : -1)
            }
        },
    }
</script>

<style scoped>

</style>