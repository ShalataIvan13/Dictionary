<template>
    <div>
        <div class="container d-flex flex-column flex-md-row align-items-center p-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">Learn English</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <router-link :to="{name: 'word.index'}" class="me-3 py-2 text-dark text-decoration-none">Words</router-link>
                <router-link :to="{name: 'word.create'}" class="me-3 py-2 text-dark text-decoration-none">Add word</router-link>
                <router-link :to="{name: 'word.edit'}" class="me-3 py-2 text-dark text-decoration-none">Edit word</router-link>
            </nav>
        </div>

        <p>Привет, Пользователь! ID: 1 </p>

        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "Index",
        
    }
</script>

<style scoped>

</style>