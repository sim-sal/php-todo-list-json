<script>
import axios from "axios";
export default {
  data() {
    return {
      toDoList: [],
      newToDoElement: {
        todo_text: ""
      }
    };
  },
  methods: {
    onSubmit() {

      const url = 'http://localhost/php-todo-list-json/back-end/postTodolist.php';
      const data = this.newToDoElement;
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };
      // console.error("on submit", this.newToDoElement.todo_text);

      if (this.newToDoElement.todo_text !== "") {
        axios.post(url, data, headers)
          .then(result => {
            this.toDoList = result.data;

            this.newToDoElement.todo_text = "";

          }).catch(error => console.error("error", error))
      } else {
        alert("DEVI RIEMPIRE IL CAMPO PER AGGIUNGERE QUALCOSA IN LISTA!!");
      }

    },
    deleteToDo(index) {

      const url = 'http://localhost/php-todo-list-json/back-end/deleteToDo.php';
      const data = { "index": index };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };

      axios.post(url, data, headers)
        .then(result => {

          const data = result.data;
          this.toDoList = data;
        });
    }

  },
  mounted() {
    axios.get('http://localhost/php-todo-list-json/back-end/')
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

        <li v-for="(toDo, index) in toDoList" :key="index">
          <h4>{{ toDo.todo_text }}</h4>
          <div class="trash_container" @click="deleteToDo(index)">
            <i class="fa-solid fa-trash"></i>
          </div>
        </li>

      </ul>
    </div>

    <div class="form_container">
      <form @submit.prevent="onSubmit">
        <input type="text" name="todo_text" placeholder="Inserisci nuova cosa da fare" v-model="newToDoElement.todo_text">
        <input class="my_submit" type="submit" value="ADD NEW TO-DO">
      </form>
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

.line-through {
  text-decoration: line-through;
}

.trash_container {
  padding: 5px;
  border: 1px solid black;
  border-radius: 3px;
  background-color: #ff5454;
  color: white;
}

li>.trash_container:hover {
  cursor: pointer;
  background-color: rgb(129, 0, 0);
}

.list_container {
  width: 40%;
  margin: auto;
  background-color: white;
  padding: 10px;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.list_container {
  max-height: 500px;
  overflow-y: auto;
}

.list_container::-webkit-scrollbar {
  width: 12px;
}

.list_container::-webkit-scrollbar-track {
  background-color: #ccc;
  box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.5);
  border-radius: 10px;
}

.list_container::-webkit-scrollbar-thumb {
  background-color: #0066ce;
  border-radius: 10px;
}

.form_container {
  position: fixed;
  left: 30%;
  bottom: 135px;
  width: 40%;
  margin: auto;
  background-color: white;
  padding: 10px;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

.form_container>form {
  display: flex;
  justify-content: space-around;
}

.my_submit {
  color: white;
  background-color: rgb(0, 0, 122);
  padding: 5px;
  border: none;
  border-radius: 5px;
}

.my_submit:hover {
  cursor: pointer;
  background-color: rgb(87, 87, 255);
}
</style>
