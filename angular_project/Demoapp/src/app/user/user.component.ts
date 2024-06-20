import { Component, OnInit, inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-user',
  standalone: true,
  imports : [],
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit{
  public data:any;
  constructor(private httpClient: HttpClient){}
  
  ngOnInit(): void {
    this.fetchData();
  }
  fetchData(){
    this.httpClient
    .get('https://jsonplaceholder.typicode.com/todos/1').subscribe(
      (data: any) =>{
      console.log(data);
      this.data = data;
    });
  }
}