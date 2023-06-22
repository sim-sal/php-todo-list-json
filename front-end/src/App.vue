<script>
import axios from "axios";
export default {
  data() {
    return {
      toDoList: []
    };
  },
  mounted() {
    axios.get('http://localhost/php-todo-list-json/')
      .then(result => {
        // console.log(JSON.stringify(result));
        this.toDoList = result.data;
      })
  }
}
</script>

<template>
  <div>
    <h1>TODO LIST</h1>
    <ul>
      <li v-for="(toDo, index) in toDoList" :key="index">{{ toDo.do }}</li>
    </ul>
  </div>
</template>

<style></style>
