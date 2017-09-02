import { Component, OnInit } from '@angular/core';
import { ActivatedRoute,Router }   from '@angular/router';//rutas

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit() {
  }
  onClick(){
    localStorage.setItem('token','true');
    this.router.navigate(['menu']);
  }

}
