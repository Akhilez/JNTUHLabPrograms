import javax.xml.parsers.*;
import org.xml.sax.*;
import java.io.*;

class SAX extends HandlerBase {
    int x = 0;
    static String eid = "";
	
    public static void main(String args[]) throws Exception {
        System.out.println("enter employee id (01/02/03/04/05) :");
        eid = new java.util.Scanner(System.in).nextLine();
		
        SAXParser sp = SAXParserFactory.newInstance().newSAXParser();
        sp.parse("Employees.xml", new SAX());
    }
	
    public void startElement(String name, AttributeList al) throws SAXException {
        if ("employee".equals(name)) {
            String id = al.getValue("id");
            if (id.equals(eid))
                x = 1;
        }
    }
    public void endElement(String name) throws SAXException {
        if ("employee".equals(name))
            x = 0;
    }
    public void characters(char data[], int st, int length) throws SAXException {
        if (x == 1) {
            int i = st;
            for (int count = 0; count < length; count++, i++) 
                System.out.print(data[i]);
            System.out.println();
        }
    }
}