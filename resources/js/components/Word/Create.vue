<template>
    <div>
        <h3>Добавьте слова которые вы хотите учить!</h3>
        <form class="flex w-25 mt-3" method="post">
            <input class="form-control mt-2" v-model="en" type="text" name="en" placeholder="en" required>
            <input class="form-control mt-2" v-model="ru" type="text" name="ru" placeholder="ru" required>
            <textarea class="form-control mt-2" v-model="phrase" type="text" name="phrase" placeholder="phrase"></textarea>
            <button @click.prevent="add" class="btn btn-primary mt-2">Сохранить</button>
        </form>
    </div>
</template>

<script>
    import router from '../../router'

    export default {
        name: "Create",

        data() {
            return {
                en: null,
                ru: null,
                phrase: null,
                user_id: null,
            }
        },

        mounted() {
            this.getAuthUser()
        },

        methods: {
            add() {
                axios.post('/api/words', {en: this.en, ru: this.ru, phrase: this.phrase, user_id: this.user_id})
                .then( res => {
                    router.push({name: 'word.index'})
                })
            },

            getAuthUser() {
                axios.get('/api/user/')
                .then( res => {
                    this.user_id = res.data
                })
            },
        },
    }
</script>

<style scoped>

</style>