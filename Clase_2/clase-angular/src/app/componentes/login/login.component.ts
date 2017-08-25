import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  private usuario:string;
  private password:string;
  constructor() { }

  ngOnInit() {
  
  }
  OnClick(){
    console.log(this.usuario);
  }

}
