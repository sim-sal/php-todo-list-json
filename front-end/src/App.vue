<script>
import axios from "axios";
export default {
  data() {
    return {
      toDoList: []
    };
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

        <li v-for="(toDo, index) in toDoList" :key="index">{{ toDo.do }}
          <div class="trash_container">
            <i class="fa-solid fa-trash"></i>
          </div>
        </li>

      </ul>
    </div>

    <div class="form_container">
      <form>
        <input type="text" placeholder="Inserisci nuova cosa da fare">
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

.list_container,
.form_container {
  width: 40%;
  margin: auto;
  background-color: white;
  padding: 10px;
  border-radius: 5px;
  margin-bottom: 10px;
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
  background-color: rgb(56, 56, 255);
}
</style>
