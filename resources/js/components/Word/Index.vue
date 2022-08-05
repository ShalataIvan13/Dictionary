<template>
    <div>
        <div class="mt-4">
            <h3>Список слов</h3>
            <div class="search">
                <input class="form-control mt-2 w-25" type="text" v-model="search" placeholder="Поиск...">
            </div>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">En</th>
                    <th scope="col">Ru</th>
                    <th scope="col">Phrase</th>
                    <th scope="col">Reting</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                <template v-for="(word, index) in api">
                    <tr class="wrapp-word" :key="index">
                        <td><p>{{ word.en }}</p></td>
                        <td><p>{{ word.ru }}</p></td>
                        <td><p>{{ word.phrase }}</p></td>
                        <td><span class="rating"><span @click="updateRating(word.id, n, index)" v-for="(n, index) in 5" :class="{active: n <= word.rating}" :key="index">★</span></span></td>
                        <td><a href="#" @click.prevent="changeEditWordId(word.id, word.en, word.ru, word.phrase)" class="btn btn-primary">Редактировать</a></td>
                        <td><a href="#" @click.prevent="deleteWord(word.id)" class="btn btn-danger">Удалить</a></td>
                    </tr>
                    <tr v-if="editWordId === word.id" :key="'x'+index">
                        <td><input class="form-control" v-model="en" type="text"></td>
                        <td><input class="form-control" v-model="ru" type="text"></td>
                        <td><input class="form-control" v-model="phrase" type="text"></td>
                        <td><a href="#" @click.prevent="updateWord(word.id)" class="btn btn-success">Сохранить</a></td>
                        <td><a href="#" @click.prevent="editWordId = null" class="btn btn-primary">Отмена</a></td>
                    </tr>
                </template>
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
                editWordId: null,
                search: null,
                en: null,
                ru: null,
                phrase: null,
            }
        },

        mounted() {
            this.getWords()
        },

        methods: {
            getWords() {
                axios.get('/api/words')
                .then( res => {
                    this.api = res.data
                    // console.log(res.data)
                })
            },

            updateWord(id) {
                this.editWordId = null
                axios.patch(`/api/words/${id}`, {en: this.en, ru: this.ru, phrase: this.phrase})
                .then( res => {
                    this.getWords()
                })
            },

            deleteWord(id) {
                axios.delete(`/api/words/${id}`)
                .then( res => {
                    this.getWords()
                })
            },

            updateRating(id, n, index) {

            },

            changeEditWordId(id, en, ru, phrase) {
                this.editWordId = id
                this.en = en
                this.ru = ru
                this.phrase = phrase
            },
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
                return output.sort((a, b) => (a.rating > b.rating) ? -1 : 1)
            }
        },
    }
</script>

<style scoped>

    .active {
        color: rgba(0, 0, 0);
    }
    .rating {
        color: rgba(0, 0, 0, 0.466);
    }

</style>