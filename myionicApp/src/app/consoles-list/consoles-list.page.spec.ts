import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConsolesListPage } from './consoles-list.page';

describe('ConsolesListPage', () => {
  let component: ConsolesListPage;
  let fixture: ComponentFixture<ConsolesListPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConsolesListPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConsolesListPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
