import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConsolesListComponent } from './consoles-list.component';

describe('ConsolesListComponent', () => {
  let component: ConsolesListComponent;
  let fixture: ComponentFixture<ConsolesListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConsolesListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConsolesListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
