import { Component, OnInit } from '@angular/core';
import { ActivatedRoute,Router }   from '@angular/router';//rutas
import { FormsModule  }   from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
    private usuario:string;
    
  constructor(private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit() {
  }
  onClick(){
    localStorage.setItem('token','true');
        localStorage.setItem('usuario',this.usuario);

    this.router.navigate(['menu']);
  }
 

}
