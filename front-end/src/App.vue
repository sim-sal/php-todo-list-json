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
  <main>

    <h1>TODO LIST</h1>

    <div class="list_container">
      <ul>

        <li v-for="(toDo, index) in toDoList" :key="index">{{ toDo.do }}
          <div class="trash_container">
            <i class="fa-solid fa-trash-can"></i>
          </div>
        </li>

      </ul>
    </div>

  </main>
</template>

<style>
/* regole generali */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

main {
  background-color: rgb(11, 11, 82);
  height: 100vh;
}

h1 {
  text-align: center;
  color: white;
  font-size: 60px;
  font-style: italic;
}

ul {
  list-style: none;
}

li {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
  border-bottom: 1px solid grey;
  font-size: 20px;
}

.trash_container {
  padding: 3px;
  border: 1px solid grey;
}

li>.trash_container:hover {
  cursor: pointer;
  background-color: grey;
}

.list_container {
  width: 40%;
  margin: auto;
  background-color: white;
  padding: 10px;
  border-radius: 5px;
}
</style>
